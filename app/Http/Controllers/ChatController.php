<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserConnection;
use App\Models\Post;
use App\Models\SocketChat;
use Illuminate\Support\Facades\Crypt;
use DB;

class ChatController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = auth()->user()->id;


        $user = DB::select('SELECT a.body,a.created_at as dates,b.* FROM `socket_chat` a INNER JOIN users b ON b.id = a.to_id OR b.id = a.from_id WHERE (a.from_id = "' . $user_id . '" OR a.to_id = "' . $user_id . '") AND b.id != "' . $user_id . '" GROUP BY b.id ORDER by a.id DESC');

        return view('chat/index', compact('user'));
    }

    public function getUserChat(Request $request)
    {
        $input = $request->all();
        $getData = User::where('id', $input['user_id'])->first();
        $data = array();
        if (!empty($getData)) {
            $data['success'] = 'done';
        } else {
            $data['success'] = 'error';
        }

        $login_user_id = auth()->user()->id;
        $recived_user_id = $input['user_id'];

        $msg = DB::Select("SELECT * FROM 
        ( select * from 
        ( SELECT a.id, a.from_id, a.to_id, a.body,a.seen,a.created_at,a.file,u.name,u.photo 
            FROM socket_chat a INNER JOIN users u ON u.id = a.from_id WHERE
              (a.from_id = '" . $login_user_id . "' AND a.to_id = '".$recived_user_id."' )
                  ORDER BY a.id  ASC ) as a 
        UNION 
        select * from 
        ( SELECT a1.id, a1.from_id, a1.to_id, a1.body,a1.seen,a1.created_at,a1.file,u1.name,u1.photo
         FROM socket_chat a1 INNER JOIN users u1 ON u1.id = a1.from_id  WHERE 
          ( a1.from_id = '" . $recived_user_id . "' AND a1.to_id = '" . $login_user_id . "') 
           ORDER BY a1.id ASC ) as b ) as c  
            GROUP BY id ORDER BY id ASC");

        $html =  view('chat/chat_msg', compact('getData', 'msg'))->render();
        return response()->json(['success' => $data['success'], 'html' => $html]);
    }

    public function sendMessage(Request $request)
    {
        $input = $request->all();

        // dd($input);
        $image = $request->file('photo');
            if ($image != '') {
                $new_name = $this->uploadImage($image, 'upload/chat');
            } else {
                $new_name = "";
            }
        $insert = new SocketChat();
        $insert->from_id = auth()->user()->id;
        $insert->to_id = $input['to_id'];
        if($input['body'] != ''){
            $insert->body = $input['body'];
        }
       
        if($new_name != ''){
            $insert->file = $new_name;
        }
        $insert->seen = 0;
        $insert->save();

        if($insert){
            return response()->json(['success' => 'done']);
        }else{
            return  response()->json(['success' => 'error']);
        }


       

    }

    public function getNewUser(Request $request){
        $input = $request->all();
        $user_id = auth()->user()->id;
        // $user = User::where('id', $input['id'])->first();
        $user = DB::select('select a.*,b.body,b.created_at from users a LEFT join socket_chat b ON a.id = b.to_id OR a.id = b.from_id where a.id = '.$input['id'].' limit 1;');
        return response()->json(['success' => 'done', 'html' => $user[0]]);
    }

    public function deleteChat($id){
        $delete = SocketChat::where('from_id',auth()->user()->id)->where('to_id',$id)->delete();
        $delete = SocketChat::where('from_id',$id)->where('to_id',auth()->user()->id)->delete();
        $delete = true;
        if($delete){
            return redirect('user/chat')->with('success', "Chat Deleted Successfully");
        }else{
            return redirect('user/chat')->with('error', "Sorry, Somthing went wrong Please try again!");
        }
    }
}

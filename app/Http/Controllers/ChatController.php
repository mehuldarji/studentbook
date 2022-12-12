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
      

        $user = DB::select('SELECT a.body,a.created_at as dates,b.* FROM `socket_chat` a INNER JOIN users b ON b.id = a.to_id OR b.id = a.from_id WHERE (a.from_id = "'.$user_id.'" OR a.to_id = "'.$user_id.'") AND b.id != "'.$user_id.'" GROUP BY b.id ORDER by a.id DESC');
       
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

        $msg = DB::Select("SELECT * FROM ( select * from ( SELECT a.id, a.from_id, a.to_id, a.body,a.seen,a.created_at,u.name,u.photo FROM socket_chat a INNER JOIN users u ON u.id = a.from_id WHERE  (a.from_id = '".$login_user_id."' )  AND a.body != ''  ORDER BY a.id  ASC ) as a UNION select * from ( SELECT a1.id, a1.from_id, a1.to_id, a1.body,a1.seen,a1.created_at,u1.name,u1.photo FROM socket_chat a1 INNER JOIN users u1 ON u1.id = a1.from_id  WHERE  ( a1.from_id = '".$recived_user_id."')  AND a1.body != '' ORDER BY a1.id ASC ) as b ) as c   GROUP BY id ORDER BY id ASC");
// dd($msg);
        $html =  view('chat/chat_msg', compact('getData','msg'))->render();
        return response()->json(['success' => $data['success'], 'html' => $html]);
        
    }
}
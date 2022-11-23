<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Crypt;
use DB;

class HomeController extends Controller
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
        $connection = DB::Select('SELECT * FROM users WHERE id IN (SELECT ids from (SELECT connected_id as ids FROM `user_connections` a  WHERE user_id = "' . auth()->user()->id . '"  AND status = 1 UNION ALL SELECT user_id as ids FROM `user_connections` a  WHERE connected_id = "' . auth()->user()->id . '"  AND status = 1) as x) ');
        $post =  Post::join('users', 'users.id', 'posts.user_id')->select('posts.*', 'users.name', 'users.headline', 'users.photo')->orderby('id','desc')->get();
        return view('home/index', compact('connection', 'post'));
    }

    public function suggestionUsers()
    {
        $user = User::where('users.id', '!=', auth()->user()->id)
            ->select('id', 'name', 'headline', 'photo')->get();
        $data = [];
        $allIds = [];
        foreach ($user as $row) {
            $data[] = $row->name . ' <span style="font-size: 11px;color:#b7b9cc!important">(' . $row->headline . ') </span> <img style="float: right;padding-bottom: 2px;" class="img-profile rounded-circle" src="' . asset('upload/users/' . $row->photo) . '">';
            $allIds[] = Crypt::encryptString($row->id);
        }
        return response()->json(['data' => $data, 'allIds' => $allIds]);
    }

    public function savePost(Request $request)
    {
        $input = $request->all();
        if ($input['type'] == 'post') {
            $image = $request->file('photo');
            if ($image != '') {
                $new_name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('upload/posts'), $new_name);
            } else {
                $new_name = "";
            }
        }
        $insert = new Post();
        $insert->user_id = auth()->user()->id;
        $insert->desc = $input['post'];
        $insert->type = $input['type'];
        if ($new_name != '') {
            $insert->poll = $new_name;
        }
        $insert->created_at = date('Y-m-d H:i:s');
        $insert->save();

        if ($insert) {
            return response()->json(['success' => 'done']);
        } else {
            return  response()->json(['success' => 'error']);
        }
    }
}

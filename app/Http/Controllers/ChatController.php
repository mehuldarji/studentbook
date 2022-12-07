<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserConnection;
use App\Models\Post;
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
        $user = User::all();
        $invitation_send = UserConnection::join('users', 'users.id', 'user_connections.connected_id')
        ->select('user_connections.*', 'users.name', 'users.headline', 'users.photo', DB::raw('(SELECT count(*) as followers FROM `user_connections`  WHERE (connected_id = users.id OR user_id = users.id) AND status = 1) as followers'))
        ->where('user_connections.user_id', auth()->user()->id)->where('user_connections.status', 0)->get();

    $invitation_recived = UserConnection::join('users', 'users.id', 'user_connections.user_id')
        ->select('user_connections.*', 'users.name', 'users.headline', 'users.photo', DB::raw('(SELECT count(*) as followers FROM `user_connections`  WHERE (connected_id = users.id OR user_id = users.id) AND status = 1) as followers'))
        ->where('user_connections.connected_id', auth()->user()->id)->where('user_connections.status', 0)->get();
    $connection = DB::Select('SELECT * FROM users WHERE id IN (SELECT ids from (SELECT connected_id as ids FROM `user_connections` a  WHERE user_id = "' . auth()->user()->id . '"  AND status = 1 UNION ALL SELECT user_id as ids FROM `user_connections` a  WHERE connected_id = "' . auth()->user()->id . '"  AND status = 1) as x) ');


        return view('chat/index', compact('user', 'invitation_send', 'invitation_recived', 'connection'));
    }

    
}

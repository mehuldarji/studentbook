<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserConnection;
use App\Models\UserEducation;
use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Crypt;
use DB;

class ConnectionController extends Controller
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
        $user = array();
      
        $invitation_send = UserConnection::join('users', 'users.id', 'user_connections.connected_id')
            ->select('user_connections.*', 'users.name', 'users.headline', 'users.photo', DB::raw('(SELECT count(*) as followers FROM `user_connections`  WHERE (connected_id = users.id OR user_id = users.id) AND status = 1) as followers'))
            ->where('user_connections.user_id', auth()->user()->id)->where('user_connections.status', 0)->get();

        $invitation_recived = UserConnection::join('users', 'users.id', 'user_connections.user_id')
            ->select('user_connections.*', 'users.name', 'users.headline', 'users.photo', DB::raw('(SELECT count(*) as followers FROM `user_connections`  WHERE (connected_id = users.id OR user_id = users.id) AND status = 1) as followers'))
            ->where('user_connections.connected_id', auth()->user()->id)->where('user_connections.status', 0)->get();
        $connection = DB::Select('SELECT * FROM users WHERE id IN (SELECT ids from (SELECT connected_id as ids FROM `user_connections` a  WHERE user_id = "' . auth()->user()->id . '"  AND status = 1 UNION ALL SELECT user_id as ids FROM `user_connections` a  WHERE connected_id = "' . auth()->user()->id . '"  AND status = 1) as x) ');


        return view('connection/connection', compact('user', 'invitation_send', 'invitation_recived', 'connection'));
    }
    public function getMyContact(Request $request)
    {
        $input = $request->all();

        $user = DB::Select('SELECT * FROM users WHERE id IN (SELECT ids from (SELECT connected_id as ids FROM `user_connections` a  WHERE user_id = "' . auth()->user()->id . '"  AND status = 1 UNION ALL SELECT user_id as ids FROM `user_connections` a  WHERE connected_id = "' . auth()->user()->id . '"  AND status = 1) as x) limit '.$input['start'].', '.$input['limit'].'');

        if (COUNT($user) > 0) {
            $success = 'done';
        } else {
            $success = 'invalid';
        }
        $html =  view('connection/connection_contact', compact('user'))->render();
        return response()->json(['success' => $success, 'html' => $html]);
    }
    public function getDataConnection(Request $request)
    {
        $input = $request->all();

        $user = User::leftJoin('user_connections', function ($join) {
            $join->on('user_connections.connected_id', '=', 'users.id')
                ->where('user_connections.user_id', '=', auth()->user()->id);
        })
            ->leftJoin('user_connections  as a', function ($join) {
                $join->on('a.user_id', '=', 'users.id')
                    ->where('a.connected_id', '=', auth()->user()->id);
            })
            ->select('users.*', 'user_connections.status', 'a.status as my_request', DB::raw('(SELECT count(*) as followers FROM `user_connections`  WHERE (connected_id = users.id OR user_id = users.id) AND status = 1) as followers'))
            ->where('users.id', '!=', auth()->user()->id)
            ->where('a.status', null)
            ->Where('user_connections.status', null)
            ->skip($input['start'])->take($input['limit'])->get();
        if (COUNT($user) > 0) {
            $success = 'done';
        } else {
            $success = 'invalid';
        }
        $html =  view('connection/connection_user', compact('user'))->render();
        return response()->json(['success' => $success, 'html' => $html]);
    }

    public function connectedRequestSend(Request $request)
    {
        $input = $request->all();

        $check = UserConnection::where('user_id', auth()->user()->id)->where('connected_id', $input['connected_id'])->first();

        if (empty($check)) {
            $check = UserConnection::where('connected_id', auth()->user()->id)->where('user_id', $input['connected_id'])->first();

            if (empty($check)) {
                $insert = new UserConnection();
                $insert->user_id = auth()->user()->id;
                $insert->connected_id = $input['connected_id'];
                $insert->save();
            } else {
                $insert = UserConnection::where('connected_id', auth()->user()->id)->where('user_id', $input['connected_id'])->where('status', '1')->delete();
            }
        } else {
            $insert = UserConnection::where('user_id', auth()->user()->id)->where('connected_id', $input['connected_id'])->where('status', '1')->delete();
        }

        $insert = true;
        if ($insert) {
            return response()->json(['success' => 'done']);
        } else {
            return response()->json(['success' => 'error']);
        }
    }

    public function unfollow(Request $request)
    {
        $input = $request->all();


        $insert = UserConnection::where('id', $input['connection_id'])->delete();



        if ($insert) {
            return response()->json(['success' => 'done']);
        } else {
            return response()->json(['success' => 'error']);
        }
    }

    public function changeStatus(Request $request)
    {
        $input = $request->all();
        $update = UserConnection::where('id', $input['connection_id'])->first();
        $update->status = $input['status'];
        $update->save();
        if ($update) {
            return response()->json(['success' => 'done']);
        } else {
            return response()->json(['success' => 'error']);
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Support\Facades\Redirect;
use App\Models\Notification;
use DB;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        Notification::where('user_id', auth()->user()->id)
            ->update(["is_read" => "1"]);

        $notification  = Notification::where('user_id', auth()->user()->id)->get();
        $connection = DB::Select('SELECT * FROM users WHERE id IN (SELECT ids from (SELECT connected_id as ids FROM `user_connections` a  WHERE user_id = "' . auth()->user()->id . '"  AND status = 1 UNION ALL SELECT user_id as ids FROM `user_connections` a  WHERE connected_id = "' . auth()->user()->id . '"  AND status = 1) as x) ');
        
        $view_profile = DB::select('SELECT count(*) as last_seven_days_view_profile FROM `user_profile_views` WHERE DATE(created_at) > (NOW() - INTERVAL 7 DAY)');
        
        return view('notification.index', compact('notification','connection','view_profile'));
    }
}

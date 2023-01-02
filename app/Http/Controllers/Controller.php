<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Models\Notification;
use App\Models\MailCron;
use App\Models\UserProfileView;
use App\Models\User;
use Mail;
use App\Mail\SendMail;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function insertNotification($data)
    {
        $insert = new Notification();
        $insert->user_id = $data['user_id'];
        $insert->description = $data['description'];
        $insert->created_at = date('Y-m-d H:i:s');
        $insert->save();
    }
    public function insertMailNotification($data)
    {
        $insert = new MailCron();
        $insert->user_id = $data['user_id'];
        $insert->send_email = $data['send_email'];
        $insert->to_email = $data['to_email'];
        $insert->email_page = $data['email_page'];
        $insert->data = $data['data'];
        $insert->subject = $data['subject'];
        $insert->templete = $data['templete'];
        $insert->status = $data['status'];
        $insert->created_at = date('Y-m-d H:i:s');
        $insert->save();
    }

    public function getUserEmail($user_id)
    {
        $getData = User::where('id', $user_id)->select('email')->first();
        return $getData->email;
    }
    public function getUserName($user_id)
    {
        $getData = User::where('id', $user_id)->select('name')->first();
        return $getData->name;
    }

    public function getUser($user_id)
    {
        $getData = User::where('id', $user_id)->first();
        return $getData;
    }

    public static  function get_timeago($ptime)
    {
        $estimate_time = time() - $ptime;

        if ($estimate_time < 1) {
            return 'just now';
        }

        $condition = array(
            12 * 30 * 24 * 60 * 60 => 'year',
            30 * 24 * 60 * 60 => 'month',
            24 * 60 * 60 => 'day',
            60 * 60 => 'hour',
            60 => 'minute',
            1 => 'second'
        );

        foreach ($condition as $secs => $str) {
            $d = $estimate_time / $secs;

            if ($d >= 1) {
                $r = round($d);
                return $r . ' ' . $str . ($r > 1 ? 's' : '') . ' ago';
            }
        }
    }

    public static function sendEmail($data)
    {

        $testMailData = [
            'subject' => $data['subject'],
            'body' => $data['message'],
            'email' => $data['email'],
            'name' => $data['name'],
            'password' => $data['password'],
            'to_email' => $data['to_email'],
        ];

        Mail::to($data['to_email'])->send(new SendMail($testMailData));
    }

    public static function get_tiny_url($url)
    {
        $ch = curl_init();
        $timeout = 5;
        curl_setopt($ch, CURLOPT_URL, 'http://tinyurl.com/api-create.php?url=' . $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }

    public static function addProfileView($data)
    {
       
        $check = UserProfileView::where('user_id', $data['user_id'])->where('view_user_id', $data['view_user_id'])->first();
        if (empty($check)) {
           
            $getData = User::where('id', $data['user_id'])->select('name')->first();
       
        
            $insert1 = new Notification();
            $insert1->user_id = $data['view_user_id'];
            $insert1->description = $getData->name .' view your profile.';
            $insert1->created_at = date('Y-m-d H:i:s');
            $insert1->save();


            $insert = new UserProfileView();
            $insert->user_id = $data['user_id'];
            $insert->view_user_id = $data['view_user_id'];
            $insert->created_at = date('Y-m-d H:i:s');
            $insert->save();
        }
    }

    public static function uploadImage($image, $folder)
    {
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path($folder), $new_name);
        return $new_name;
    }
}

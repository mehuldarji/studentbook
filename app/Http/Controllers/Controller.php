<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Models\Notification;
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
}

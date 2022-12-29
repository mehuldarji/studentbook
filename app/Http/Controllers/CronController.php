<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Support\Facades\Redirect;
use App\Models\MailCron;
use Mail;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Crypt;

class CronController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function sendEmailByCronJobs()
    {
        $getData = MailCron::where('status', '0')->get();
      
        if ($getData->count() > 0) {
            foreach ($getData as $row) {
                $dt = json_decode($row->data);
               $data =  (array)$row;
               $testMailData = [
                'subject' => $row->subject,
                'body' =>$row->templete,
                'email' => $row->email_page,
                'to_email' => $row->to_email,
                'data' => $row->data,
                'img' => asset('upload/users').'/'.$dt->photo,
                'url' => route('profile.index',Crypt::encryptString($dt->id))
            ];
            // dd($testMailData);
    
            Mail::to( $row->to_email)->send(new SendMail($testMailData));

               

            }
        }
    }
}

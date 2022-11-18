<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserEducation;
use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class ProfileController extends Controller
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

        $user = User::where('id', auth()->user()->id)->first();
        $user_education = UserEducation::where('user_id', auth()->user()->id)->get();
        return view('profile/my_profile', compact('user', 'user_education'));
    }
    public function update()
    {
        $user = User::where('id', auth()->user()->id)->first();
        $user_education = UserEducation::where('user_id', auth()->user()->id)->get();
        return view('profile/update_profile', compact('user', 'user_education'));
    }

    public function save(Request $request)
    {
        $input = $request->all();

        $User = User::where('id', auth()->user()->id)->first();
        if ($input['type'] == 'about') {
            $User->about = $input['about'];
        }
        if ($input['type'] == 'social') {
            $User->youtube_link = $input['youtube_link'];
            $User->twitter_link = $input['twitter_link'];
            $User->facebook_link = $input['facebook_link'];
            $User->instagram_link = $input['instagram_link'];
        }

        if ($input['type'] == 'img') {
            $image = $request->file('photo');
            if ($image != '') {
                $new_name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('upload/users'), $new_name);
            } else {
                $new_name = "";
            }

            $User->photo =  $new_name;
        }
        if ($input['type'] == 'password') {
            if (auth()->user()->password == Hash::make($input['old_password'])) {
                return response()->json(['success' => 'diff', 'msg' => 'Old Password is wrong!']);
            }else{
                $User->password =  Hash::make($input['new_password']);
            }
           
        }


        if ($input['type'] == 'info') {
            $User->name = $input['name'];
            $User->email = $input['email'];
            $User->b_month = $input['b_month'];
            $User->b_date = $input['b_date'];
            $User->b_year = $input['b_year'];
            $User->gender = $input['gender'];
            $User->headline = $input['headline'];
            $User->location = $input['location'];
            $User->phone = $input['phone'];
            $User->language = $input['language'];

            UserEducation::where('user_id', auth()->user()->id)->delete();
            for ($i = 0; $i < COUNT($input['from']); $i++) {

                $UserE = new UserEducation();
                $UserE->user_id = auth()->user()->id;
                $UserE->from = $input['from'][$i];
                $UserE->to = $input['to'][$i];
                $UserE->institute = $input['institute'][$i];
                $UserE->position = $input['position'][$i];
                $UserE->created_at = date('Y-m-d H:i:s');
                $UserE->save();
            }
        }


        $User->save();

        if ($User) {
            return response()->json(['success' => 'done']);
        } else {
            return  response()->json(['success' => 'error']);
        }
    }
}

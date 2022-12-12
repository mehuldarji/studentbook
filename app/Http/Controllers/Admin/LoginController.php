<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    
    public function login() {
        
    return view('admin/login/login');
        
    }
    
    public function login_admin(Request $request) {
        
        $admin = Admin::where('email','=',$request->email)->first();
      
         if($admin){
             
        if(Hash::check($request->password, $admin->password)){
             $request->session()->put('name',$admin->name);

            return redirect('admin/dashboard')->with('success', "Login Successfully");

          } else{
             return redirect('admin/login')->with('error','Incorrect Password');
             }
        }
        else{
            return redirect('admin/login')->with('error','Incorrect Email Or Password');
               
      }
    }
    
    public function logout(Request $request) {
        
          Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

         return redirect('admin/login')->with('success', "Logout Successfully");
    }
    
    
     public function dashboard() {
         
         $countrys =  \App\Models\User::select('location')->whereNotNull('location')->distinct()->get();
         
//          $current_year =  \App\Models\User::whereyear('created_at',date('Y'))->count();
//          $year =  \App\Models\User::whereyear('created_at',date('Y', strtotime('-1 year')))->count();

                
           for($i = 1; $i <= 12; $i++){
        
            $year_month = date('Y-'.sprintf("%02d",$i));
            $months =  \App\Models\User::where(DB::raw('DATE_FORMAT(created_at, "%Y-%m")'),$year_month)->count();
             
            $data[] = $months;
         }
//          $data=array('0'=>10,'1'=>15,'2'=>7,'3'=>42,'4'=>21,'5'=>11,'6'=>37,'7'=>11,'8'=>5,'9'=>13,'10'=>43,'11'=>20);

          return view('admin/dashboard/dashboard', compact('countrys'))->with('month',json_encode($data,JSON_NUMERIC_CHECK));
        
    }
}

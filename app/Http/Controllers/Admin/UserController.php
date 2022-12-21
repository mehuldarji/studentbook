<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\UsersDataTable;
use App\Models\Websitetable;
use Illuminate\Support\Facades\DB;

class UserController extends Controller {

    public function usertable(UsersDataTable $datatable) {

        return $datatable->render('admin/user/usertable');
    }

    public function landingpage() {

        $logos = Websitetable::where(['type' => 'brand_logo'])->get();

        $landing_images = Websitetable::where(['type' => 'landing_img'])->get();

        return view('admin/landing_page', compact('logos', 'landing_images'));
    }

    public function update(Request $request) {

        if (!empty($request->logo)) {
            
            $logo_img = $request->file('logo')->getClientOriginalName();
            $request->file('logo')->move(base_path() . '/public/assets_admin/upload', $logo_img);

            $logo = array('logo' => $logo_img);
            DB::table('websitetables')->where('id', $request->logo_id)->update($logo);
        }

        $footer = array('about_description' => $request->footer_text);
        DB::table('websitetables')->where('id', $request->logo_id)->update($footer);

         $landing_count = Websitetable::where(['type' => 'landing_img'])->count();
         
         if($landing_count == 0){
             
             
            $img = $request->file('landing_image')->getClientOriginalName();
            $request->file('landing_image')->move(base_path() . '/public/assets_admin/upload', $img);
            
            $landing_image = array('logo' => $img,'type' => 'landing_img','about' => $request->about, 'about_description' => $request->about_description);
            DB::table('websitetables')->insert($landing_image);
            
         }else{
             
        if (!empty($request->landing_image)) {

            $img = $request->file('landing_image')->getClientOriginalName();
            $request->file('landing_image')->move(base_path() . '/public/assets_admin/upload', $img);

            $landing_image = array('logo' => $img);
            DB::table('websitetables')->where('id', $request->about_id)->update($landing_image);
            
        }
            $about = array('about' => $request->about, 'about_description' => $request->about_description);
            DB::table('websitetables')->where('id', $request->about_id)->update($about);
        
        }

        return redirect('admin/landing')->with('success', "Updated Successfully");
    }

}

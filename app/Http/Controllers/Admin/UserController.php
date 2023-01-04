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

        $websitetables = Websitetable::get();

        return view('admin/landing_page', compact('websitetables'));
    }

    public function update(Request $request) {

        
        if (!empty($request->logo)) {
            
            $logo_img = $request->file('logo')->getClientOriginalName();
            $request->file('logo')->move(base_path() . '/public/assets_admin/upload', $logo_img);

            $logo = array('logo' => $logo_img);
            DB::table('websitetables')->where('id', $request->id)->update($logo);
        }
        
        if (!empty($request->landing_image)) {

            $img = $request->file('landing_image')->getClientOriginalName();
            $request->file('landing_image')->move(base_path() . '/public/assets_admin/upload', $img);

            $landing_image = array('landing_image' => $img);
            DB::table('websitetables')->where('id', $request->id)->update($landing_image);
            
        }
        
            $about = array('about' => $request->about, 'about_description' => $request->about_description,'footer_text'=>$request->footer_text);  

            DB::table('websitetables')->where('id', $request->id)->update($about);
        
            return redirect('admin/landing')->with('success', "Updated Successfully");
 
    }

}

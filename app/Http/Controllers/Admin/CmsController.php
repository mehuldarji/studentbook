<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\DataTables\CmsDataTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CmsController extends Controller {


        public function cms(CmsDataTable $datatable) {

            return $datatable->render('admin/cms/cms');
        }

        public function cms_add() {

            return view('admin/cms/cms-form');
        }

        public function cms_store(Request $request) {

            
            $slug = Str::slug($request->page_name);
            
            $cms = array('slug' => $slug, 'content' => $request->content, 'page_name' => $request->page_name, 'created_at' => date('Y-m-d H:i:s'));
            DB::table('cms')->insert($cms);

            return redirect('admin/cms');
        }

        public function cms_edit($id) {
            $cms = \App\Models\Cms::where(['id' => $id])->get();
            return view('admin/cms/cms-edit', compact('cms'));
        }

        public function cms_delete($id) {
            DB::delete("delete from `cms` WHERE id = '$id'");
            return redirect('admin/cms');
        }

        public function cms_update( Request $request, $id) {
            
            $slug = Str::slug($request->page_name);
            
            $cms = array('slug' => $slug, 'content' => $request->content, 'page_name' => $request->page_name, 'updated_at' => date('Y-m-d H:i:s'));
            DB::table('cms')->where('id', $id)->update($cms);

            return redirect('admin/cms');
        }

}

<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\FaqCategory;
use App\DataTables\Faq_categoriesDataTable;

class HelpController extends Controller
{
    
    public function help_center(Faq_categoriesDataTable $datatable) {
        
        return $datatable->render('admin/help-center/help');
        
    }
        
        public function help_add() {
            
            return view('admin/help-center/help-form');
            
        }
        
        public function help_store(Request $request) {
            
            $faq_categories = array('name' => $request->name , 'created_at' => date('Y-m-d H:i:s'));
            DB::table('faq_categories')->insert($faq_categories);
            
            return redirect('admin/help-center');
        }
        
        public function help_edit($id) {

            $faq_categorie = FaqCategory::where(['id' => $id])->get();
            return view('admin/help-center/help-edit', compact('faq_categorie'));
        }
        
        public function help_delete($id) {

             DB::delete("delete from `faq_categories` WHERE id = '$id'");
             return redirect('admin/help-center');
        }
        
        public function help_update(Request $request , $id) {
            
            $faq_categories = array('name' => $request->name , 'updated_at' => date('Y-m-d H:i:s'));
            DB::table('faq_categories')->where('id', $id)->update($faq_categories);

            return redirect('admin/help-center');
            
            }
            
            public function help_faqs($id) {

                return view('admin/help-center/help-faq',compact("id"));
                
            }
            
            public function helpfaqs_store(Request $request) {
                
                $faqs = array('category_id' => $request->id ,'question' => $request->question , 'answer' => $request->answer ,'created_at' => date('Y-m-d H:i:s'));
                DB::table('faqs')->insert($faqs);
                
                return redirect('admin/help-center');
            }

}

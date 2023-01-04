<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\FaqCategory;
use App\Models\Faq;
use App\DataTables\Faq_categoriesDataTable;
use App\DataTables\FaqsDataTable;
use Illuminate\Support\Facades\Redirect;

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
        
        public function help_cancle() {
  
             return redirect('admin/help-center');
             
        }
        
        
         public function help_update(Request $request , $id) {
            
            $faq_categories = array('name' => $request->name , 'updated_at' => date('Y-m-d H:i:s'));
            DB::table('faq_categories')->where('id', $id)->update($faq_categories);

            return redirect('admin/help-center');
            
            }
        
            public function help_delete($id) {

                 DB::delete("delete from `faq_categories` WHERE id = '$id'");
                 return redirect('admin/help-center');
            }
        
            
            public function help_faqs(FaqsDataTable $datatable , $id) {
                
                 $faq_categorie = FaqCategory::where(['id' => $id])->get();
                 $name = $faq_categorie[0]->name;

                return $datatable->with('id', $id)->render('admin/help-center/help-faqslist', ['id' => $id],['name'=>$name]);

            }
            public function helpfaqs_add($id) {
                
                return view('admin/help-center/help-faqsform', compact('id'));
                
            }
            
            
                public function helpfaqs_store(Request $request) {
                
                $faqs_data = array('category_id' => $request->id ,'question' => $request->question , 'answer' => $request->answer ,'created_at' => date('Y-m-d H:i:s'));
                DB::table('faqs')->insert($faqs_data);
                
                return redirect()->to('admin/help-faqs/'.$request->id);
            }
            
            public function helpfaqs_cancle($id) {

                return redirect()->to('admin/help-faqs/'.$id);
                
            }
            
            
            public function helpfaqs_edit($id) {
                
                $faqs_data = Faq::where(['id' => $id])->get();
                return view('admin/help-center/help-faqedit', compact('faqs_data'));

            }
            
            
            public function helpfaqs_delete($id) {
                
                DB::delete("delete from `faqs` WHERE id = '$id'");
                return Redirect::back();
            }
            
            public function helpfaqs_update(Request $request ,$id) {
                
                $faqs = Faq::select('category_id')->where(['id' => $id])->get();
                $category_id = $faqs[0]->category_id;

                $faqs_data = array('question' => $request->question ,'answer' => $request->answer , 'updated_at' => date('Y-m-d H:i:s'));
                DB::table('faqs')->where('id', $id)->update($faqs_data);
                
                return redirect()->to('admin/help-faqs/'.$category_id);
            }

}

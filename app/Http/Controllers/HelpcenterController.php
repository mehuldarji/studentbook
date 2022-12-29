<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Support\Facades\Redirect;
use App\Models\Faq;
use App\Models\FaqCategory;
use DB;

class HelpcenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {

        $faqs = array();
        $faqsArray = array();
        $category = FaqCategory::all();
        if (COUNT($category) > 0) {
            foreach ($category as $row) {
                $faqs['category_name'] = $row->name; 
                $faqs['faq'] = $category = Faq::where('category_id',$row->id)->get();
                $faqsArray[] = $faqs;
            }
        }
       
        return view('help-center.index',compact('faqsArray'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Support\Facades\Redirect;
use App\Models\Cms;
use DB;

class CmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   

    public function index($slug)
    { 
        
        $recode = Cms::where('slug',$slug)->first();
        return view('cms.index',compact('recode'));
    }
}

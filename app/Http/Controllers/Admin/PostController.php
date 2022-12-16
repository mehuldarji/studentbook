<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    
    public function titlepage() {
       
        return view('admin/post/title');
        
    }
    
    public function description() {
        
        return view('admin/post/description');
        
    }
    
    public function youtube_url() {
        
        return view('admin/post/youtube');
        
    }
    
    
}

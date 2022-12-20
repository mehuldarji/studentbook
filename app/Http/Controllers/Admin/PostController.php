<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    
    public function post() {
       
        $posts = Post::where('type','youtube')->get();
        return view('admin/post/post', compact('posts'));
        
    }
    
    public function post_form() {
        
        return view('admin/post/post_form');
    }
    
    public function post_store(Request $request) {
        
         $request->validate([
                'youtube_url' => ['required', 'regex:/^(?:https?:\/\/)?(?:m\.|www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/i']
            ]);
         
        $youtube_video = str_replace("https://www.youtube.com/watch?v=", "", "$request->youtube_url");
        $image = 'http://img.youtube.com/vi/'.$youtube_video.'/maxresdefault.jpg';
          
          $post = array('type' => 'youtube','user_id' => '0','title' => $request->title,'youtube_link' => $request->youtube_url,'desc' => $request->description,'img' => $image);
          
           DB::table('posts')->insert($post);
           
           return redirect('admin/post');
    }
    
    
    
    public function post_edit($id) {
        
        $posts = Post::where(['id' => $id])->get();
        return view('admin/post/post_edit', compact('posts'));
    }
    
    public function post_delete($id) {
       
        DB::delete( "delete from `posts` WHERE id = '$id'");
        return redirect('admin/post');
    }
    
      public function post_update(Request $request, $id) {
          
           $request->validate([
                'title' => 'required',
                'youtube_url' => ['required', 'regex:/^(?:https?:\/\/)?(?:m\.|www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/i']
            ]);
          
        $post = array('title' => $request->title,'youtube_link' => $request->youtube_url,'desc' => $request->description);
        DB::table('posts')->where('id', $id)->update($post);

        return redirect('admin/post');
        
    }
    
   
    
}

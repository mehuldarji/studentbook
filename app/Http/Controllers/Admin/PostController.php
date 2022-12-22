<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use App\DataTables\PostsDataTable;

class PostController extends Controller {

    public function post(PostsDataTable $datatable) {

//        $posts = Post::where('type','youtube')->get();
//        return view('admin/post/post', compact('posts'));

        return $datatable->render('admin/post/post');
    }

    public function post_form() {

        return view('admin/post/post_form');
    }

    public function post_store(Request $request) {

        $request->validate([
            'youtube_url' => ['required', 'regex:/^(?:https?:\/\/)?(?:m\.|www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/i']
        ]);

        if (preg_match("/\b(?:vimeo|youtube|dailymotion)\.com\b/i", $request->youtube_url)) {

            $youtube_video = str_replace("https://www.youtube.com/watch?v=", "", "$request->youtube_url");
            $image = 'http://img.youtube.com/vi/' . $youtube_video . '/maxresdefault.jpg';
        }else {
            $youtube_video = str_replace("https://youtu.be/", "", "$request->youtube_url");
            $image = 'http://img.youtube.com/vi/' . $youtube_video . '/maxresdefault.jpg';
        }

        $post = array('type' => 'youtube', 'user_id' => '0', 'title' => $request->title, 'youtube_link' => $request->youtube_url, 'desc' => $request->description, 'img' => $image, 'created_at' => date('Y-m-d H:i:s'));
        DB::table('posts')->insert($post);

        return redirect('admin/post');
    }

    public function post_edit($id) {

        $posts = Post::where(['id' => $id])->get();
        return view('admin/post/post_edit', compact('posts'));
    }

    public function post_delete($id) {

        DB::delete("delete from `posts` WHERE id = '$id'");
        return redirect('admin/post');
    }

    public function post_update(Request $request, $id) {

        $request->validate([
            'title' => 'required',
            'youtube_url' => ['required', 'regex:/^(?:https?:\/\/)?(?:m\.|www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/i']
        ]);

        if (preg_match("/\b(?:vimeo|youtube|dailymotion)\.com\b/i", $request->youtube_url)) {

            $youtube_video = str_replace("https://www.youtube.com/watch?v=", "", "$request->youtube_url");
            $image = 'http://img.youtube.com/vi/' . $youtube_video . '/maxresdefault.jpg';
        } else {
            $youtube_video = str_replace("https://youtu.be/", "", "$request->youtube_url");
            $image = 'http://img.youtube.com/vi/' . $youtube_video . '/maxresdefault.jpg';
        }

        $post = array('title' => $request->title, 'youtube_link' => $request->youtube_url, 'desc' => $request->description, 'img' => $image, 'updated_at' => date('Y-m-d H:i:s'));
        DB::table('posts')->where('id', $id)->update($post);

        return redirect('admin/post');
    }

}

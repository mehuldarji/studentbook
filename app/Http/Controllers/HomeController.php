<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\PostComment;
use App\Models\PostLike;
use Illuminate\Support\Facades\Crypt;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $connection = DB::Select('SELECT * FROM users WHERE id IN (SELECT ids from (SELECT connected_id as ids FROM `user_connections` a  WHERE user_id = "' . auth()->user()->id . '"  AND status = 1 UNION ALL SELECT user_id as ids FROM `user_connections` a  WHERE connected_id = "' . auth()->user()->id . '"  AND status = 1) as x) ');
        $post =  Post::join('users', 'users.id', 'posts.user_id')->select('posts.*', 'users.name', 'users.headline', 'users.photo')->orderby('id', 'desc')->get();
        $post = array();
        return view('home/index', compact('connection', 'post'));
    }

    public function getPost(Request $request)
    {
        $input = $request->all();

        $connection = DB::Select('SELECT id FROM users WHERE id IN (SELECT ids from (SELECT connected_id as ids FROM `user_connections` a  WHERE user_id = "' . auth()->user()->id . '"  AND status = 1 UNION ALL SELECT user_id as ids FROM `user_connections` a  WHERE connected_id = "' . auth()->user()->id . '"  AND status = 1) as x) ');
        $conn = array();
        if (COUNT($connection) > 0) {
            foreach ($connection as $row) {
                $conn[] = $row->id;
            }
        }
        $conn[] = auth()->user()->id;
        $conn[] = 0;

        $post =  Post::leftjoin('users', 'users.id', 'posts.user_id')
            ->whereIn('posts.user_id', $conn)
            ->select('posts.*', 'users.name', 'users.headline', 'users.photo', 'posts.id as primarys')
            ->offset($input['start'])->limit($input['limit'])
            ->groupBy('posts.id')
            ->orderby('posts.id', 'desc')
            ->get();



        if (COUNT($post) > 0) {
            $success = 'done';
        } else {
            $success = 'invalid';
        }

        $html =  view('home/post', compact('post'))->render();
        return response()->json(['success' => $success, 'html' => $html]);
    }

    public function getPostComment(Request $request)
    {
        $input = $request->all();

        $comment = PostComment::join('users', 'users.id', 'post_comments.user_id')
            ->select('post_comments.*', 'users.name', 'users.headline', 'users.photo')
            ->where('post_comments.post_id', $input['id'])->orderBy('post_comments.id', 'desc')->get();
        $id = $input['id'];


        $html =  view('home/comment', compact('comment', 'id'))->render();
        return response()->json(['success' => 'done', 'html' => $html]);
    }
    public function savePostComment(Request $request)
    {
        $input = $request->all();
        $insert = new PostComment();
        $insert->comment = $input['comment'];
        $insert->post_id = $input['post_id'];
        $insert->user_id = auth()->user()->id;
        $insert->save();
        if ($insert) {
            return response()->json(['success' => 'done']);
        } else {
            return  response()->json(['success' => 'error']);
        }
    }
    public function postLike(Request $request)
    {
        $input = $request->all();
        $check = PostLike::where('post_id', $input['post_id'])->where('user_id', auth()->user()->id)->first();
        if (!empty($check)) {
            $insert =  PostLike::where('post_id', $input['post_id'])->where('user_id', auth()->user()->id)->delete();
            if ($insert) {
                return response()->json(['success' => 'done']);
            } else {
                return  response()->json(['success' => 'error']);
            }
        }
        $insert = new PostLike();
        $insert->like = 1;
        $insert->post_id = $input['post_id'];
        $insert->user_id = auth()->user()->id;
        $insert->save();
        if ($insert) {
            return response()->json(['success' => 'done']);
        } else {
            return  response()->json(['success' => 'error']);
        }
    }

    public function suggestionUsers()
    {
        $user = User::where('users.id', '!=', auth()->user()->id)
            ->select('id', 'name', 'headline', 'photo')->get();
        $data = [];
        $allIds = [];
        foreach ($user as $row) {
            $data[] = $row->name . ' <span style="font-size: 11px;color:#b7b9cc!important">(' . $row->headline . ') </span> <img style="float: right;padding-bottom: 2px;" class="img-profile rounded-circle" src="' . asset('upload/users/' . $row->photo) . '">';
            $allIds[] = Crypt::encryptString($row->id);
        }
        return response()->json(['data' => $data, 'allIds' => $allIds]);
    }

    public function savePost(Request $request)
    {
        $input = $request->all();
        //  dd($input);
        if ($input['type'] == 'post') {
            $image = $request->file('photo');
            if ($image != '') {
                $new_name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('upload/posts'), $new_name);
            } else {
                $new_name = "";
            }
        }
        $insert = new Post();
        $insert->user_id = auth()->user()->id;
        if (@$input['post'] != '') {
            $insert->desc = $input['post'];
        }
        if (@$input['title'] != '') {
            $insert->title = $input['title'];
        }
        if (@$input['que'] != '') {
            $insert->que = $input['que'];
        }
        if (@$input['ans'] != '') {
            $insert->ans = $input['ans'];
        }

        $insert->type = $input['type'];
        if (@$new_name != '') {
            $insert->img = $new_name;
        }
        $insert->created_at = date('Y-m-d H:i:s');
        $insert->save();

        if ($insert) {
            return response()->json(['success' => 'done']);
        } else {
            return  response()->json(['success' => 'error']);
        }
    }

    public function showArticle($id)
    {
        $article = Post::where('id', Crypt::decryptString($id))->first();
        return view('home/articalDetail', compact('article'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\PostComment;
use App\Models\PostLike;
use App\Models\PollAnalysis;
use App\Models\UserProfileView;
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
        $view_profile = DB::select('SELECT count(*) as last_seven_days_view_profile FROM `user_profile_views` WHERE DATE(created_at) > (NOW() - INTERVAL 7 DAY)');
        return view('home/index', compact('connection', 'post','view_profile'));
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
                $new_name = $this->uploadImage($image, 'upload/posts');
                
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

    public function peopleViewProfile()
    {
      
        $data = DB::select('SELECT b.*,c.status FROM `user_profile_views` a INNER JOIN users b on b.id = a.user_id left join user_connections c on c.connected_id = a.user_id OR c.user_id = a.user_id where a.view_user_id = "'.auth()->user()->id.'" and c.status is null order by a.id desc limit 10');
        $html =  view('home/profile_view_user', compact('data'))->render();
        if (count($data) > 0) {
            return response()->json(['success' => 'done', 'html' => $html]);
        } else {
            return  response()->json(['success' => 'error', 'html' => '']);
        }
    }

    public function showArticle($id)
    {
        $article =  Post::leftjoin('users', 'users.id', 'posts.user_id')
            ->select('posts.*', 'users.name', 'users.headline', 'users.photo', 'posts.id as primarys')
            ->where('posts.id', Crypt::decryptString($id))
            ->first();

        return view('home/articalDetail', compact('article'));
    }

    public function pollAnalysis(Request $request)
    {
        $input = $request->all();

        $check = PollAnalysis::where('post_id', $input['post_id'])->where('user_id', auth()->user()->id)->first();
        if (!empty($check)) {
            $insert =  PollAnalysis::where('post_id', $input['post_id'])->where('user_id', auth()->user()->id)->delete();
            if ($insert) {
                $analysis =  $this->getAnalysisValue($input['post_id']);

                return response()->json(['success' => 'done', 'analysis' => $analysis[0]]);
            } else {
                return  response()->json(['success' => 'error', 'analysis' => array()]);
            }
        }

        $insert = new PollAnalysis();
        $insert->post_id = $input['post_id'];
        $insert->option = $input['option'];
        $insert->option_index = $input['option_index'];
        $insert->user_id = auth()->user()->id;
        $insert->created_at = date('Y-m-d H:i:s');
        $insert->save();
        if ($insert) {
            $analysis =  $this->getAnalysisValue($input['post_id']);


            return response()->json(['success' => 'done', 'analysis' => $analysis[0]]);
        } else {
            return  response()->json(['success' => 'error', 'analysis' => array()]);
        }
    }


    public static function getAnalysisValue($input)
    {

        $analysis = DB::Select('SELECT
            IFNULL(
                (
                SELECT
                    ((100 * analysis) / all_analisis) AS option_analysis
                FROM
                    (
                    SELECT
                        COUNT(*) AS analysis,
                        (
                        SELECT
                            COUNT(*)
                        FROM
                            poll_analysis
                        WHERE
                            post_id = "' . $input . '"
                    ) AS all_analisis
                FROM
                    poll_analysis
                WHERE
                    post_id = "' . $input . '" AND option_index = "1"
                ) AS X
            ),
            "0.000"
            ) AS A,
            IFNULL(
                (
                SELECT
                    ((100 * analysis) / all_analisis) AS option_analysis
                FROM
                    (
                    SELECT
                        COUNT(*) AS analysis,
                        (
                        SELECT
                            COUNT(*)
                        FROM
                            poll_analysis
                        WHERE
                            post_id = "' . $input . '"
                    ) AS all_analisis
                FROM
                    poll_analysis
                WHERE
                    post_id = "' . $input . '" AND option_index = "2"
                ) AS X
            ),
           "0.000"
            ) AS B,
            IFNULL(
                (
                SELECT
                    ((100 * analysis) / all_analisis) AS option_analysis
                FROM
                    (
                    SELECT
                        COUNT(*) AS analysis,
                        (
                        SELECT
                            COUNT(*)
                        FROM
                            poll_analysis
                        WHERE
                            post_id = "' . $input . '"
                    ) AS all_analisis
                FROM
                    poll_analysis
                WHERE
                    post_id = "' . $input . '" AND option_index = "3"
                ) AS X
            ),
           "0.000"
            ) AS C,
            IFNULL(
                (
                SELECT
                    ((100 * analysis) / all_analisis) AS option_analysis
                FROM
                    (
                    SELECT
                        COUNT(*) AS analysis,
                        (
                        SELECT
                            COUNT(*)
                        FROM
                            poll_analysis
                        WHERE
                            post_id = "' . $input . '"
                    ) AS all_analisis
                FROM
                    poll_analysis
                WHERE
                    post_id = "' . $input . '" AND option_index = "4"
                ) AS X
            ),
           "0.000"
            ) AS D');

        return $analysis;
    }
}

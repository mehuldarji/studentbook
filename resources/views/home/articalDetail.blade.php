@include('include.header')
<link href="{{ asset('css/post.css') }}" rel="stylesheet" type="text/css">
<?php
use App\Http\Controllers\HomeController;
?>
<style>
    .articleDetail img {
        width: 100% !important;
        object-fit: cover;
    }

    .bg-primary {
        background-color: #0172BD !important;
    }

    .fa-arrow-left {
        animation: tilt-shaking 0.25s linear infinite;
    }

    @keyframes tilt-shaking {
        0% {
            transform: rotate(0deg);
        }

        25% {
            transform: rotate(5deg);
        }

        50% {
            transform: rotate(0eg);
        }

        75% {
            transform: rotate(-5deg);
        }

        100% {
            transform: rotate(0deg);
        }
    }
</style>
<?php $row = $article; ?>



<!-- <div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="blog-card padding-card box shadow-sm rounded bg-white mb-3 border-0">

                    <div class="card-body articleDetail" >
                        {!! $article->desc !!}
                    </div>

                </div>
                <div class="padding-card reviews-card box shadow-sm rounded bg-white mb-3 border-0">
                    <div class="card-body">
                        <h5 class="card-title mb-4">3 Reviews</h5>
                        <div class="media mb-4">
                            <img class="d-flex mr-3 rounded" src="{{ asset('img/user/1.jpg')}}" alt="">
                            <div class="media-body">
                                <h5 class="mt-0">Stave Martin <small>Feb 12, 2020</small>
                                    
                                </h5>
                                <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                            </div>
                        </div>
                       
                    </div>
                </div>
                <div class="padding-card box shadow-sm rounded bg-white mb-3 border-0">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Leave a Comment</h5>
                        <form name="sentMessage">
                            
                            <div class="control-group form-group">
                                <div class="controls">
                                    <label>Review <span class="text-danger">*</span></label>
                                    <textarea rows="10" cols="100" class="form-control"></textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">SUBMIT</button>
                        </form>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
</div> -->

<div class="container pt-5 pb-5">
    <?php

    $comment = App\Models\PostComment::join('users', 'users.id', 'post_comments.user_id')
        ->select('post_comments.*', 'users.name', 'users.headline', 'users.photo')
        ->where('post_comments.post_id', $row->id)->orderBy('post_comments.id', 'desc')->get();

    $like = App\Models\PostLike::where('post_id', $row->id)->get();

    $checkLike = App\Models\PostLike::where('post_id', $row->id)->where('user_id', auth()->user()->id)->first();
    $checkPoll = array();
    if ($row->type == 'poll') {

        $checkPoll = App\Models\PollAnalysis::where('post_id', $row->id)->where('user_id', auth()->user()->id)->first();

        $getPollAnalysis  = HomeController::getAnalysisValue($row->id);


        $getPollAnalysisRecode  =  $getPollAnalysis[0];
    }
    $likeIS = '0';

    $icon = 'feather-heart';
    if (!empty($checkLike)) {
        $likeIS = '1';
        $icon = 'fa fa-heart';
    } else {
        $likeIS = '0';
        $icon = 'feather-heart';
    }
    ?>
    @if($row->type != 'youtube')
    <div class="box shadow-sm border rounded bg-white mb-3 osahan-post post_{{ $row->id }}" data-aos="zoom-in">
        <div class="p-3 d-flex align-items-center border-bottom osahan-post-header">
            <div class="dropdown-list-image mr-3">
                <img class="rounded-circle" onerror="this.onerror=null;this.src='https://cdn-icons-png.flaticon.com/512/3135/3135715.png';" src="{{ asset('upload/users/')}}/{{ $row->photo }}" alt="">
                <div class="status-indicator bg-success"></div>
            </div>
            <div class="font-weight-bold">
                <div class="text-truncate">{{ $row->name }}</div>
                <div class="small text-gray-500">{{ $row->headline }}</div>
            </div>
            <span class="ml-auto small">
                <?php
                $time = App\Http\Controllers\Controller::get_timeago(strtotime($row->created_at));
                ?>
                {{ $time }}
            </span>
        </div>
        <div class="p-3 border-bottom osahan-post-body">

            @if($row->type == 'article')
            <h6>{{ $row->title }}</h6>
            @endif
            @if($row->desc != '')
            <p class="mb-0 posts box" id="descshow{{ $row->id }}">{!! $row->desc !!}
            </p>
            @if($row->type != 'article')
            <p class="mb-0 posts box " style="display: none" id="descless{{ $row->id }}">{!! $row->desc !!} 
            </p>
            @endif
            @endif
            @if($row->img != '')
            <?php
            $ext = strtolower(pathinfo($row->img, PATHINFO_EXTENSION));

            if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' || $ext == 'tif' || $ext == 'tiff' || $ext == 'bmp' || $ext == 'gif' || $ext == 'eps' || $ext == 'jfif') {
            ?>
                <img style="width: 100%;margin-top:15px" src="{{ asset('upload/posts') }}/{{ $row->img  }}">

            <?php
            } else {
            ?>
                <video width="510" height="310" controls autoplay>
                    <source src="{{ asset('upload/posts') }}/{{ $row->img  }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            <?php
            }
            ?>
            @endif

            @if($row->type == 'poll')
            <div class="wrapper">
                <header>{{ $row->que }}</header>
                <div class="poll-area" <?php if (!empty($checkPoll)) { ?> style="pointer-events: none" <?php } ?>>


                    <?php
                    $i = 1;
                    $option = explode(',', $row->ans);
                    foreach ($option as $rows) {
                        if ($rows != '') {
                    ?>
                            <?php
                            $per = '0';
                            if ($i == 1) {
                                $per = round($getPollAnalysisRecode->A);
                            } else if ($i == 2) {
                                $per = round($getPollAnalysisRecode->B);
                            } else if ($i == 3) {
                                $per = round($getPollAnalysisRecode->C);
                            } else if ($i == 4) {
                                $per = round($getPollAnalysisRecode->D);
                            } else {
                                $per = '0';
                            }
                            ?>
                            <input type="checkbox" name="poll" id="opt-<?= rand() . $i ?>">
                            <label for="opt-<?= rand() . $i ?>" class="opt-<?= rand() . $i ?> selectedOption <?php if (!empty($checkPoll)) { ?> selectall selected <?php } ?>" data-option="<?= $rows ?>" data-index="{{ $i }}" data-post-id="{{ $row->id }}">
                                <?php if (!empty($checkPoll)) { ?>
                                    <span class="percentage_bar" style="width: <?= $per ?>%;"></span>
                                <?php } else {
                                ?>
                                    <span id="percentage_bar_{{ $row->id }}_<?= $i ?>" class="percentage_bar"></span>
                                <?php
                                } ?>
                                <div class="row">
                                    <div class="column">
                                        <?php if (empty($checkPoll)) { ?>
                                            <span class="circle"></span>
                                        <?php } ?>
                                        <span class="text" <?php if (!empty($checkPoll)) { ?> style="padding-left:9px" <?php } ?>><?= $rows ?> </span>
                                    </div>

                                    <span class="percent percent_{{ $row->id }}_<?= $i ?>"><?= @$per ?>%</span>
                                </div>
                                <!-- <div class="progress " id="progress_{{ $row->id }}_<?= $i ?>" style='--w:<?= @$per ?>'></div> -->
                            </label>
                    <?php $i++;
                        }
                    } ?>
                </div>
            </div>
            @endif

        </div>

        <div class="p-3 border-bottom osahan-post-footer">
            <a href="javascript:void()" data-count="<?= COUNT($like) ?>" data-is-like="<?= @$likeIS ?>" data-id="<?= @$row->id  ?>" class="mr-3 text-secondary clickLike"><i class="<?= @$icon ?> text-danger icon<?= @$row->id  ?>" data-toggle="tooltip" data-placement="top" data-original-title="Like & Unlike"></i><span class="value<?= @$row->id  ?>"> <?php if (COUNT($like) > 0) {
                                                                                                                                                                                                                                                                                                                                                                    echo COUNT($like);
                                                                                                                                                                                                                                                                                                                                                                } ?></span></a>
            <a href="javascript:void()" data-toggle="tooltip" data-placement="top" data-original-title="Comments" class="mr-3 text-secondary opencomment" data-id="<?= @$row->id  ?>"><i class="feather-message-square"></i> <?php if (COUNT($comment) > 0) {
                                                                                                                                                                                                                                    echo COUNT($comment);
                                                                                                                                                                                                                                } ?></a>



            <script async src="https://static.addtoany.com/menu/page.js"></script>
            <div class="a2a_kit a2a_kit_size_32 a2a_default_style" data-a2a-url="<?= App\Http\Controllers\Controller::get_tiny_url(route('article.show', Crypt::encryptString($row->id))); ?>" data-toggle="tooltip" data-placement="top" data-original-title="Please share a post" style="display: inline-block;vertical-align: middle;">

                <a class="a2a_dd " href="https://www.addtoany.com/share" style="margin-top: -3px;">
                    <img src="{{ asset('img/share.png') }}" border="0" alt="Share" width="13" height="13">
                </a>
            </div>

            <script async src="https://static.addtoany.com/menu/page.js"></script>
            <div class="" id="commentList<?= @$row->id  ?>"></div>

        </div>

    </div>
    @else
    <div class="box shadow-sm border rounded bg-white mb-3 osahan-post" data-aos="zoom-in">
        <div class="p-3 d-flex align-items-center border-bottom osahan-post-header">
            <div class="dropdown-list-image mr-3">
                <img class="rounded-circle" onerror="this.onerror=null;this.src='https://cdn-icons-png.flaticon.com/512/3135/3135715.png';" src="{{ asset('img/logo.png')}}" alt="">
                <div class="status-indicator bg-success"></div>
            </div>
            <div class="font-weight-bold">
                <div class="text-truncate">Studentbook</div>
                <div class="small text-gray-500">Company Profile</div>
            </div>
            <span class="ml-auto small">
                <?php
                $time = App\Http\Controllers\Controller::get_timeago(strtotime($row->created_at));
                ?>
                {{ $time }}
            </span>
        </div>
        <div class="p-3 border-bottom osahan-post-body">


            <h6>{{ $row->title }}</h6>
            @if($row->desc != '')
            <p class="mb-0 posts box" id="descshow{{ $row->id }}">{!! $row->desc !!}
            </p>
            @if($row->type != 'article')
            <p class="mb-0 posts box " style="display: none" id="descless{{ $row->id }}">{!! $row->desc !!} 
            </p>
            @endif
            @endif

            <a style="position: relative;" target="_blanck" href="{{ $row->youtube_link }}"><img style="width: 100%;margin-top:15px" src="{{ $row->img }}">
                <div class="centered">
                    <div class="play"></div>
                </div>
            </a>



        </div>

        <div class="p-3 border-bottom osahan-post-footer">
            <a href="javascript:void()" data-count="<?= COUNT($like) ?>" data-is-like="<?= @$likeIS ?>" data-id="<?= @$row->id  ?>" class="mr-3 text-secondary clickLike"><i class="<?= @$icon ?> text-danger icon<?= @$row->id  ?>" data-toggle="tooltip" data-placement="top" data-original-title="Like & Unlike"></i><span class="value<?= @$row->id  ?>"> <?php if (COUNT($like) > 0) {
                                                                                                                                                                                                                                                                                                                                                                    echo COUNT($like);
                                                                                                                                                                                                                                                                                                                                                                } ?></span></a>
            <a href="javascript:void()" data-toggle="tooltip" data-placement="top" data-original-title="Comments" class="mr-3 text-secondary opencomment" data-id="<?= @$row->id  ?>"><i class="feather-message-square"></i> <?php if (COUNT($comment) > 0) {
                                                                                                                                                                                                                                    echo COUNT($comment);
                                                                                                                                                                                                                                } ?> </a>



            <script async src="https://static.addtoany.com/menu/page.js"></script>
            <div class="a2a_kit a2a_kit_size_32 a2a_default_style" data-a2a-url="<?= App\Http\Controllers\Controller::get_tiny_url(route('article.show', Crypt::encryptString($row->id))); ?>" data-toggle="tooltip" data-placement="top" data-original-title="Please share a post" style="display: inline-block;vertical-align: middle;">

                <a class="a2a_dd " href="https://www.addtoany.com/share" style="margin-top: -3px;">
                    <img src="{{ asset('img/share.png') }}" border="0" alt="Share" width="13" height="13">
                </a>
            </div>

            <script async src="https://static.addtoany.com/menu/page.js"></script>

            <script>
                var a2a_config = a2a_config || {};
                a2a_config.counts = {
                    recover_protocol: 'http',
                    recover_domain: '{{ substr (Request::root(), 7); }}'
                };
                a2a_config.icon_color = "#0172BD";
            </script>
            <div class="" id="commentList<?= @$row->id  ?>"></div>

        </div>

    </div>
    @endif

</div>
@include('include.footer')


@include('home.javascript')

<script>
    $('.opencomment').click();
</script>
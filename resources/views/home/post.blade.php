
<style>
.osahan-post-body img{
    width: 100%;
}
    </style>
@if(!empty($post))
@foreach($post as $row)
<?php
$comment = App\Models\PostComment::join('users', 'users.id', 'post_comments.user_id')
        ->select('post_comments.*', 'users.name', 'users.headline', 'users.photo')
        ->where('post_comments.post_id', $row->id)->orderBy('post_comments.id','desc')->get();
        

        ?>
<div class="box shadow-sm border rounded bg-white mb-3 osahan-post" data-aos="zoom-in">
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
        <p class="mb-0 posts box" id="descshow{{ $row->id }}">{!! substr($row->desc,0, 100) !!}   @if($row->type != 'article' && strlen($row->desc) > 100) <a href="javascript:void(0)" data-id="{{ $row->id }}" data-type="descshow" class="show-btn" style="font-weight:bold">Read more</a>@elseif($row->type == 'article') <a href="{{ route('article.show', Crypt::encryptString($row->id)) }}" class="show-btn" style="font-weight:bold">Read more</a> @endif
        </p>
        @if($row->type != 'article')
        <p class="mb-0 posts box " style="display: none" id="descless{{ $row->id }}">{!! $row->desc !!} ........ <a href="javascript:void(0)" data-id="{{ $row->id }}" data-type="descless" class="show-btn" style="font-weight:bold">Read less</a>
        </p>
        @endif
        @endif
        @if($row->img != '')
        <img style="width: 100%;margin-top:15px" src="{{ asset('upload/posts') }}/{{ $row->img  }}">
        @endif

        @if($row->type == 'poll')
        <div class="wrapper">
            <header>{{ $row->que }}</header>
            <div class="poll-area">
                <input type="checkbox" name="poll" id="opt-1">
                <input type="checkbox" name="poll" id="opt-2">
                <input type="checkbox" name="poll" id="opt-3">
                <input type="checkbox" name="poll" id="opt-4">
                <?php
                $option = explode(',', $row->ans);
                foreach ($option as $rows) {
                ?>
                    <label for="opt-1" class="opt-1">
                        <div class="row">
                            <div class="column">
                                <span class="circle"></span>
                                <span class="text"><?= $rows ?></span>
                            </div>
                            <span class="percent">30%</span>
                        </div>
                        <div class="progress" style='--w:30;'></div>
                    </label>
                <?php } ?>
            </div>
        </div>
        @endif

    </div>
    <div class="p-3 border-bottom osahan-post-footer">
        <a href="javascript:void()" class="mr-3 text-secondary"><i class="feather-heart text-danger" data-toggle="tooltip" data-placement="top" data-original-title="Like & Unlike"></i> 16</a>
        <a href="javascript:void()" data-toggle="tooltip" data-placement="top" data-original-title="Comments" class="mr-3 text-secondary opencomment" data-id="<?= @$row->id  ?>"><i class="feather-message-square"></i> <?php if(COUNT($comment) > 0){ echo COUNT($comment); } ?></a>
        <a href="javascript:void()" class="mr-3 text-secondary"><i class="feather-share-2" data-toggle="tooltip" data-placement="top" data-original-title="Share Post"></i> 2</a>
    <!-- AddToAny BEGIN -->
<!-- <div class="a2a_kit a2a_kit_size_32 a2a_default_style" data-a2a-url="https://elfsight.com/social-media-share-buttons/html/" data-a2a-title="Social Share Buttons – Add Share Buttons to HTML website code">
<a class="a2a_dd" href="https://www.addtoany.com/share"></a>
<a class="a2a_button_facebook"></a>
<a class="a2a_button_twitter"></a>
<a class="a2a_button_email"></a>
<a class="a2a_button_whatsapp"></a>
<a class="a2a_button_linkedin"></a>
<a class="a2a_button_pinterest"></a>
<a class="a2a_button_telegram"></a>
<a class="a2a_button_facebook_messenger"></a>
<a class="a2a_button_google_gmail"></a>
<a class="a2a_button_blogger"></a>
</div>
<script async src="https://static.addtoany.com/menu/page.js"></script> -->
<!-- AddToAny END -->
    </div>
    <div class="" id="commentList<?= @$row->id  ?>"></div>



</div>
@endforeach
@endif
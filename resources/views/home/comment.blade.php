

<div class="p-3 border " style="    border-color: gainsboro !important;margin-top: 13px;">
    <textarea placeholder="Add a Comment..." data-post-id="{{ $id }}" class="comments_filed form-control border-0 p-0 shadow-none" rows="1"></textarea>
    <!-- <button type="button" data-type="post" class="btn btn-primary btn-sm save_post">Share Post</button> -->
</div>
<br>
<div class="scrollbar scroll-3">
    <div class="comments overflow">
       
        @if(!empty($comment))

        @foreach($comment as $row)
        @if($row->comment !='')
        <?php
        $seconds_ago = (time() - strtotime($row->created_at));
        $timeago = "";
        if ($seconds_ago >= 31536000) {
            $timeago =   intval($seconds_ago / 31536000) . "y";
        } elseif ($seconds_ago >= 2419200) {
            $timeago =   intval($seconds_ago / 2419200) . "m";
        } elseif ($seconds_ago >= 86400) {
            $timeago =  intval($seconds_ago / 86400) . "d";
        } elseif ($seconds_ago >= 3600) {
            $timeago =  intval($seconds_ago / 3600) . "h";
        } elseif ($seconds_ago >= 60) {
            $timeago =  intval($seconds_ago / 60) . "m";
        } else {
            $timeago =  "1m";
        }
        ?>
       
        <div class="">
            <div class="py-2">
                <div class="d-flex comment">
                    <img class="rounded-circle comment-img" src="{{ asset('upload/users') }}/{{ $row->photo }}">
                    <div class="flex-grow-1 ms-3 postComment">
                        <div class="mb-1" style="color:#0172BD;font-weight:bold"> {{ $row->name }} <span class="ml-auto small" style="float: right;color: #000;">{{ $timeago }} ago</span></div>
                        <div class="mb-2">{{ $row->comment }}</div>
                        <!-- <div class="hstack align-items-center mb-2">
                            <a class="link-primary me-2" href="#"><i class="fa fa-thumbs-up"></i></a>
                            <span class="me-3 small">0</span>
                            <a class="link-secondary me-2" href="#"><i class="fa fa-thumbs-down"></i></a>
                            <span class="me-3 small">0</span>
                        </div> -->

                    </div>
                </div>

            </div>


        </div>
        @endif
        @endforeach
        @endif





    </div>
</div>
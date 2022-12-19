<style>
    .scrollbar {

        overflow-y: auto;
    }

    .overflow {
        max-height: 300px;
    }

    /* SCROLL STYLE 1*/
    .scroll-3::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 255, 0.3);
        background-color: #F5F5F5;
    }

    .scroll-3::-webkit-scrollbar-thumb {
        background-color: #0172BD;
    }

    .scroll-3::-webkit-scrollbar {
        width: 5px;
        background-color: #F5F5F5;
    }
</style>

<div class="p-3 border " style="    border-color: gainsboro !important;">
    <textarea placeholder="Add a Comment..." data-post-id="{{ $id }}" class="comments_filed form-control border-0 p-0 shadow-none" rows="1"></textarea>
    <!-- <button type="button" data-type="post" class="btn btn-primary btn-sm save_post">Share Post</button> -->
</div>

<div class="scrollbar scroll-3">
    <div class="p-3  comments overflow">
        <!-- Comment #1 //-->
        @if(!empty($comment))

        @foreach($comment as $row)

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
            <div class="py-3">
                <div class="d-flex comment">
                    <img class="rounded-circle comment-img" src="{{ asset('upload/users') }}/{{ $row->photo }}">
                    <div class="flex-grow-1 ms-3">
                        <div class="mb-1" style="color:#0172BD;font-weight:bold"> {{ $row->name }} <span class="text-muted text-nowrap" style="float: right;">{{ $timeago }} ago</span></div>
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
        @endforeach
        @endif





    </div>
</div>


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
        
        $timeago = App\Http\Controllers\Controller::get_timeago(strtotime($row->created_at));
        ?>
       
        <div class="">
            <div class="py-2">
                <div class="d-flex comment">
                    <img class="rounded-circle comment-img" src="{{ asset('upload/users') }}/{{ $row->photo }}">
                    <div class="flex-grow-1 ms-3 postComment">
                        <div class="mb-1" style="color:#0172BD;font-weight:bold"> {{ $row->name }} <span class="ml-auto small" style="float: right;color: #000;">{{ $timeago }} </span></div>
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
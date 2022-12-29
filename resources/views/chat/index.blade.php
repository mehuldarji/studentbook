@include('include.header')
<script src="http://cdnjs.cloudflare.com/ajax/libs/socket.io/4.0.0/socket.io.js"></script>
<script src="{{ asset('/js/socket.io.js') }}"></script>

<style>
    .thumbs {
        width: 115px;
        height: 115px;
        border-radius: 0.475rem;
        background-repeat: no-repeat;
        background-size: cover;
        display: block;
        margin-bottom: 13px;
        text-align: center;
        margin-left: auto;
    }

    .thumbss {
        width: 115px;
        height: 115px;
        border-radius: 0.475rem;
        background-repeat: no-repeat;
        background-size: cover;
        display: block;
        margin-bottom: 13px;
        text-align: center;
        margin-right: auto;
    }

    .fileinput-button {
        position: relative;
        overflow: hidden;
    }

    .fileinput-button input {
        position: absolute;
        top: 0;
        right: 0;
        margin: 0;
        opacity: 0;
        -ms-filter: "alpha(opacity=0)";
        font-size: 200px;
        direction: ltr;
        cursor: pointer;
    }

    .thumb {
        width: 115px;
        height: 115px;
        border-radius: 0.475rem;
        background-repeat: no-repeat;
        background-size: cover;
        border: 3px solid #65A9D6;
        box-shadow: 0 0.5rem 1.5rem 0.5rem rgb(0 0 0 / 8%);
    }

    ul.thumb-Images li {
        width: 120px;
        float: left;
        display: inline-block;
        vertical-align: top;
        height: 120px;
    }

    .img-wrap {
        position: relative;
        display: inline-block;
        font-size: 0;
    }

    .img-wrap .close {
        right: 2px;
        z-index: 100;
        padding: 6px 6px;
        color: #fff;
        font-weight: bolder;
        opacity: 1;
        font-size: 19px;
        box-shadow: 0 0.5rem 1.5rem 0.5rem rgb(0 0 0 / 8%);
        line-height: 10px;
        border-radius: 50%;
        cursor: pointer;
        position: absolute;
        transform: translate(-50%, -50%);
        left: 92%;
        top: 0;
        background: #107BC1;
        height: 25px !important;
        width: 25px !important;
    }

    .img-wrap:hover .close {
        opacity: 1;
        /* background-color: #ff0000; */
    }

    .FileNameCaptionStyle {
        font-size: 12px;
        display: none;
    }






    .dd-flex {
        display: flex;
    }

    .userlist {
        cursor: pointer;
    }

    .toMsg {
        padding: 15px;
        border-radius: 15px;
        background-color: #FFF !important;
        padding: 10px 20px;
        border-radius: 20px 20px 20px 0;
        margin: 13px 100px 13px 0px;
        text-align: left;
    }

    .toMsg p {
        margin-bottom: 7px;
        white-space: pre-wrap;
        overflow-wrap: break-word;
    }

    .fromMsg p {
        margin-bottom: 7px;
        white-space: pre-wrap;
        overflow-wrap: break-word;
    }

    .fromMsg {
        background: #275570;
        color: #fff;
        padding: 10px 20px;
        border-radius: 20px 20px 0;
        margin-left: 30px;
        background: #D4E0E6;
        color: #275570;
        padding: 10px 20px;
        border-radius: 20px 20px 0;
        margin-left: 30px;
        margin: 13px 0 13px 100px;
        text-align: left;
    }

    .userActive {
        background: #F3F2EF;
        color: #000 !important;
    }

    .userActive .text-black-50 {
        color: #000 !important;
    }

    .userActive .small {
        color: #000 !important;
    }

    .userActive i {
        color: #000 !important;
    }

    .msg_card_body {
        overflow-y: auto;
    }

    .msg_card_body {
        height: 322px;
        overflow-y: scroll;
    }

    .chat-box-single-line {
        height: 12px;
        margin: 7px 0 30px;
        position: relative;
        text-align: center;
    }

    .chatbox abbr.timestamp {
        background: rgb(137, 102, 247, 0.8);
    }

    .chatbox abbr.timestamp {
        padding: 4px 14px;
        border-radius: 4px;
        color: #fff;
    }

    .chatbox .justify-content-start {
        margin-bottom: 25px;
    }

    .chatbox .img_cont_msg {
        height: 40px;
        width: 40px;
        display: contents;
    }

    .chatbox .user_img_msg {
        height: 40px;
        width: 40px;
        border: 1.5px solid #f5f6fa;
    }

    .chatbox .msg_cotainer {
        margin-top: auto;
        margin-bottom: auto;
        margin-left: 10px;
        background-color: #F2F6F9;
        padding: 10px;
        position: relative;
        border-radius: 10px 10px 10px 0px;
        min-width: 65px;
        max-width: 80%;
    }

    .chatbox .msg_time {
        position: absolute;
        left: 0;
        bottom: -18px;
        color: #3a374e;
        font-size: 10px;
    }

    .chatbox .justify-content-end {
        margin-bottom: 25px;
    }

    .chatbox .msg_cotainer_send {
        margin-top: auto;
        margin-bottom: auto;
        margin-right: 10px;
        background-color: #0172bd2b;
        padding: 10px;
        position: relative;
        border-radius: 10px 10px 0px 10px;
        min-width: 65px;
        max-width: 80%;
    }

    .chatbox .msg_time_send {
        position: absolute;
        right: 0;
        bottom: -18px;
        color: #3a374e;
        font-size: 10px;
    }

    .chatbox .img_cont_msg {
        height: 40px;
        width: 40px;
        display: contents;
    }

    .chatbox .user_img_msg {
        height: 40px;
        width: 40px;
        border: 1.5px solid #f5f6fa;
    }

    .chatbox .img_cont {
        position: relative;
        height: 50px;
        width: 50px;
    }

    .chatbox .user_img {
        height: 50px;
        width: 50px;
        border: 1.5px solid #f5f6fa;
    }

    .chatbox h4 {
        font-size: 1.125rem;
    }

    .msg_card_body {
        height: 322px;
        overflow-y: auto;
        margin-bottom: 15px;
    }

    .overflow {
        max-height: 322px;
    }

    .scroll-3::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px #F3F2EF;
        background-color: #fff;
    }

    .scroll-3::-webkit-scrollbar-thumb {
        background-color: #fff;
    }

    .scroll-3::-webkit-scrollbar {
        width: 5px;
        background-color: #F3F2EF;
    }
</style>
<div class="py-4">
    <div class="container">
        <div class="row">

            <main class="col col-xl-12 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12" id="myChat">
                <div class="box shadow-sm rounded bg-white mb-3 osahan-chat">
                    <h5 class="pl-3 pt-3 pr-3 border-bottom mb-0 pb-3">Messaging</h5>
                    <div class="row m-0">
                        <div class="border-right col-lg-5 col-xl-3 px-0">
                            <div class="osahan-chat-left">
                                <div class="position-relative icon-form-control p-3 border-bottom">
                                    <i class="feather-search position-absolute"></i>
                                    <input placeholder="Search messages" type="text" class="form-control" id="Serach">
                                </div>
                                <div class="osahan-chat-list scroll-3" id="chatList">
                                    @if(!empty($user))
                                    @foreach($user as $row)
                                    @if(auth()->user()->id != $row->id)

                                    <?php
                                    $seconds_ago = (time() - strtotime($row->dates));
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
                                    <div data-id="{{$row->id}}" class="p-3 dd-flex align-items-center border-bottom osahan-post-header overflow-hidden userlist">
                                        <div class="dropdown-list-image mr-3"><img class="rounded-circle" src="{{ asset('upload/users/')}}/{{ $row->photo }}" alt=""></div>
                                        <div class="font-weight-bold mr-1 overflow-hidden">
                                            <div class="text-truncate">{{$row->name}}</div>
                                            <div class="small text-truncate overflow-hidden text-black-50"> {{ $row->headline }}</div>
                                        </div>
                                        <span class="ml-auto mb-auto">
                                            <div class="text-right text-muted pt-1 small">{{ $timeago }}</div>
                                        </span>
                                    </div>
                                    @endif
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9 col-xl-9 px-0 chatbox " style="opacity: 1 !important">

                        </div>
                    </div>
                </div>
            </main>

        </div>
    </div>
</div>




<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>



@include('include.footer')
@include('chat.javascript')
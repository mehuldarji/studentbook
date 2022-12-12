@include('include.header')
<style>
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
.msg_card_body{
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
    background-color: #f5f6fb;
    padding: 10px;
    position: relative;
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
    background-color: #f1f3ff;
    padding: 10px;
    position: relative;
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
.chatbox h4{
    font-size: 1.125rem;
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
                                <div class="osahan-chat-list" id="chatList">
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
                                            <div class="small text-truncate overflow-hidden text-black-50"><i class="feather-check text-primary"></i> {{ $row->body }}</div>
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
                        <div class="col-lg-9 col-xl-9 px-0 chatbox" style="opacity: 1 !important">
                         
                        </div>
                    </div>
                </div>
            </main>

        </div>
    </div>
</div>
@include('include.footer')
<script>
    $(window).bind("load", function() {
        $('.userlist:eq(0)').click();
    });


    $("#Serach").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        console.log(value);
        $("#chatList .userlist").filter(function() {

            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
    $(".userlist").on("click", function() {
        $('.userlist').removeClass('userActive');
        $(this).addClass('userActive');
        var url = '{{ route("chat.get") }}';
        var peram = {
            user_id: $(this).attr('data-id'),
        };

        var user_id = $(this).attr('data-id');
        var method = 'POST';
        $.ajax({
            url: url,
            type: method,
            data: peram,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },

            success: function(resp) {
                console.log(resp);

                if (resp.success == 'done') {
                    $('.chatbox').html(resp.html);

                } else if (resp.success == 'diff') {
                    showError(resp.msg);
                } else {
                    showError('Data processing error, Please try sometime.');
                }

            }
        })
        $('.chatbox').fadeOut();

        $('.chatbox').fadeIn();
        $('#bottom').focus();
        $('.msg_card_body').animate({scrollTop: $('.msg_card_body').prop("scrollHeight")}, 0);
    });
</script>

<script>
    var elem = document.getElementById("myChat");

    function openFullscreen() {
        if (elem.requestFullscreen) {
            elem.requestFullscreen();
        } else if (elem.webkitRequestFullscreen) {
            /* Safari */
            elem.webkitRequestFullscreen();
        } else if (elem.msRequestFullscreen) {
            /* IE11 */
            elem.msRequestFullscreen();
        }
    }
</script>
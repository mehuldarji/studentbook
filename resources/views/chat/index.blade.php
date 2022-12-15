@include('include.header')
<script src="http://cdnjs.cloudflare.com/ajax/libs/socket.io/4.0.0/socket.io.js"></script>
<script src="{{ asset('/js/socket.io.js') }}"></script>

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
        overflow-y: scroll;
        margin-bottom: 15px;
    }

    .overflow {
        height: 322px;
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
                        <div class="col-lg-9 col-xl-9 px-0 chatbox " style="opacity: 1 !important">

                        </div>
                    </div>
                </div>
            </main>

        </div>
    </div>
</div>




<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>


<script language="javascript" type="text/javascript">
    const socketProtocol = (window.location.protocol === 'https:' ? 'wss:' : 'ws:')
    const port = 3000;
    const wsUri = `${socketProtocol}//${window.location.hostname}:${port}`;
    var socket = io.connect(wsUri);

    // get dom elements
    var message = document.getElementById("body");
    var message_input = document.getElementById("body");
    var sendBtn = document.getElementById("send-message");
    var messages = document.getElementById("overflow");


    // appendMsg(body);
    // Listen for “chat” events
    socket.on("chat", function(data) {
        console.log('recived',data);
        data = JSON.parse(data);
        if ('{{auth()->user()->id}}' == data.from_id) {
            var send = 'yes';
        }else{
            var send = 'no';
        }
        if ('{{auth()->user()->id}}' != data.from_id) {
            appendMsg(data.message, send, data.photo);
        }


    });
    $(document).on('keydown', '#body', function(e) {
    
      
        if(e.which!=13){
          typing=true
          console.log({user:'salman', typing:true});
          socket.emit("typing", JSON.stringify({user:'salman', typing:true}));
         
        //   clearTimeout(timeout)
        
        }else{
        //   clearTimeout(timeout)
        //   typingTimeout()
          //sendMessage() function will be called once the user hits enter
         
        }
      })

    socket.on('typing', (data) => {

        console.log('data',data);
    // if (data.typing == true) {
      $('#typing').html(`typing...`);
    // }

    // }else {
    //   $('#typing').html("");
    // }

  })
  

    $(document).on('click', '#send-message', function() {
        send_message();
    });
    $(document).on('keydown', '#body', function() {
        if (event.which == 13) {
            send_message();
        }
    });
    // //User hits enter key 

    // //Send message
    function send_message() {
        // alert('cliekc');
        var message_input = $('#body'); //user message text
        var name_input = '{{ auth()->user()->name }}';


        if (message_input.val() == "") { //emtpy message?
            alert('enter msg.');
            return false;
        }

        //prepare json data

        var msg = {
            message: message_input.val(),
            name: name_input + " " + new Date().toLocaleString(),
            color: '#000',
            type: 'usermsg'
        };
        var body = message_input.val();
        var to_id = $('#to_id').val();
        var photo = $('#photo').val();
        var from_id = '{{ auth()->user()->id }}';
        var url = '{{ route("chat.sendMessage") }}';
        var peram = {
            body: body,
            to_id: to_id
        };
        getDataByAjaxWithoutLoader(url, peram, 'POST', '');
        if ('{{auth()->user()->id}}' == from_id) {
            var send = 'yes';
        }else{
            var send = 'no';
        }

        if ('{{auth()->user()->id}}' == from_id) {
        appendMsg(body, send,'{{auth()->user()->photo}}');
        }

        $('#bottom').focus();
        $('.msg_card_body').animate({
            scrollTop: $('.msg_card_body').prop("scrollHeight")
        }, 0);

        var msg = {
            message: message_input.val(),
            name: name_input,
            type: 'usermsg',
            to_id: to_id,
            from_id: from_id,
            photo: photo,
        };
        console.log(msg);
        message_input.val('');
       
            socket.emit("chat", JSON.stringify(msg));
        
        // mySocket.send(JSON.stringify(msg));
         //reset message input
    }



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
                // console.log(resp);
                if (resp.success == 'done') {
                    $('.chatbox').html(resp.html);
                } else if (resp.success == 'diff') {
                    showError(resp.msg);
                } else {
                    showError('Data processing error, Please try sometime.');
                }
            }
        })
        // $('.chatbox').fadeOut();
        // $('.chatbox').fadeIn();
        $('#bottom').focus();
        $('.msg_card_body').animate({
            scrollTop: $('.msg_card_body').prop("scrollHeight")
        }, 0);
    });



    function appendMsg(body, send,photo) {
        console.log(send);
        if (send == 'yes') {
            var appendHtml = '<div class="d-flex justify-content-end "><div class="msg_cotainer_send">' + body + '<span class="msg_time_send"> ' + moment(new Date(), 'ddd DD-MMM-YYYY, hh:mm A').format('hh:mm A') + '</span></div> <div class="img_cont_msg">  <img src="{{ asset("upload/users") }}/'+ photo +'" class="rounded-circle user_img_msg" alt="img"> </div></div>';
        } else {
            var appendHtml = '<div class="d-flex justify-content-start"> <div class="img_cont_msg"> <img src="{{ asset("upload/users") }}/'+ photo +'" class="rounded-circle user_img_msg" alt="img"></div><div class="msg_cotainer"> ' + body + '<span class="msg_time"> ' + moment(new Date(), 'ddd DD-MMM-YYYY, hh:mm A').format('hh:mm A') + '</span></div>';
        }
        $('.overflow').append(appendHtml);
    }
</script>

@include('include.footer')
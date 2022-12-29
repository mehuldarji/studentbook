
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
        console.log('recived', data);
        data = JSON.parse(data);
        if ('{{auth()->user()->id}}' == data.from_id) {
            var send = 'yes';
        } else {
            var send = 'no';
        }
        if ('{{auth()->user()->id}}' != data.from_id) {
            appendMsg(data.message, send, data.photo, data.file);
            $('#bottom').focus();
        $('.msg_card_body').animate({
            scrollTop: $('.msg_card_body').prop("scrollHeight")
        }, 0);
        }
    });

    socket.on('display', (data) => {
        if (data.typing == true) {
            if ('{{auth()->user()->id}}' != data.from_id) {
                $('.typing').show();
                $('.typing').focus();
            }
        } else {
            $('.typing').hide("");
        }

    });

    function typingTimeout() {
        $('.typing').hide("");
    }

    $(document).on('keydown', '#body', function(e) {
        if (e.which != 13) {
            typing = true;
            socket.emit("typing", {
                user: 'salman',
                typing: true,
                from_id :'{{ auth()->user()->id }}'
            });


        } else {
            $('.typing').hide("");
            typingTimeout()


        }
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




        //prepare json data

        var msg = {
            message: message_input.val(),
            name: name_input + " " + new Date().toLocaleString(),
            color: '#000',
            type: 'usermsg'
        };
        var body = message_input.val();
        var files = $('#fileAttachmentBtn')[0].files[0];
        var to_id = $('#to_id').val();
        var photo = $('#photo').val();
        var from_id = '{{ auth()->user()->id }}';
        var url = '{{ route("chat.sendMessage") }}';
        var peram = {
            body: body,
            to_id: to_id,
            file: files
        };

        if (body == "" && files.name == '') { //emtpy message?
            alert('enter msg.');
            return false;
        }
        // console.log(files);
        var reader = new FileReader();



        var postData = new FormData();
        postData.append('photo', files);
        postData.append('body', body);
        postData.append('to_id', to_id);






        getDataByAjaxWithoutLoader(url, postData, 'POST', '');
        if ('{{auth()->user()->id}}' == from_id) {
            var send = 'yes';
        } else {
            var send = 'no';
        }
        var filesValue = $('.thumb').attr('src');
        if ('{{auth()->user()->id}}' == from_id) {
            appendMsg(body, send, '{{auth()->user()->photo}}', filesValue);
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
            file: filesValue
        };
        console.log(msg);
        message_input.val('');

        socket.emit("chat", JSON.stringify(msg));
        $('#imgList').remove();
        // mySocket.send(JSON.stringify(msg));
        //reset message input
    }

    <?php if (@$_GET['t'] == '') {
    ?>
        $(window).bind("load", function() {
            $('.userlist:eq(0)').click();
        });
    <?php
    } else {
    ?>
        var id = "<?= base64_decode($_GET['t']) ?>";

        $.ajax({
            url: '{{ route("chat.new-user") }}',
            type: 'post',
            data: {
                id: id
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(resp) {
                console.log(resp);
                if (resp.success == 'done') {
                    if (resp.html.body == '' || resp.html.body == null) {
                        var userHtml = '<div data-id="' + resp.html.id + '" class="p-3 dd-flex align-items-center border-bottom osahan-post-header overflow-hidden userlist"><div class="dropdown-list-image mr-3"><img class="rounded-circle" src="{{ asset("upload/users/")}}/' + resp.html.photo + '" alt=""></div><div class="font-weight-bold mr-1 overflow-hidden"><div class="text-truncate">' + resp.html.name + '</div> <div class="small text-truncate overflow-hidden text-black-50">' + resp.html.headline + '</div> </div> <span class="ml-auto mb-auto"><div class="text-right text-muted pt-1 small"></div> </span> </div>'

                        $('#chatList').prepend(userHtml);
                    }

                } else {
                    showError('Data processing error, Please try sometime.');
                }
            }
        })

        $(window).bind("load", function() {
            $('.userlist:eq(0)').click();
        });
    <?php
    } ?>



    $("#Serach").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        console.log(value);
        $("#chatList .userlist").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

    $(document).on('click', '.userlist', function() {

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
                    $('#bottom').focus();
        $('.msg_card_body').animate({
            scrollTop: $('.msg_card_body').prop("scrollHeight")
        }, 0);
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



    function appendMsg(body, send, photo, file) {
        $('.typing').hide("");
        console.log(file);
        if (send == 'yes') {
            if(file != '' && typeof file != "undefined"){
                var IMG = '<img src="' + file + '" class="thumbs">';
            }else{
                var IMG = ''
            }
            var appendHtml = '<div class="d-flex justify-content-end "><div class="msg_cotainer_send"> '+ IMG +'' + body + ' <span class="msg_time_send"> ' + moment(new Date(), 'ddd DD-MMM-YYYY, hh:mm A').format('hh:mm A') + '</span></div> <div class="img_cont_msg">  <img src="{{ asset("upload/users") }}/' + photo + '" class="rounded-circle user_img_msg" alt="img"> </div></div>';
        } else {
            if(file != '' && typeof file != "undefined"){
                var IMG = '<img src="' + file + '" class="thumbss">';
            }else{
                var IMG = ''
            }
            var appendHtml = '<div class="d-flex justify-content-start"> <div class="img_cont_msg"> <img src="{{ asset("upload/users") }}/' + photo + '" class="rounded-circle user_img_msg" alt="img"></div><div class="msg_cotainer">'+ IMG +' ' + body + '<span class="msg_time"> ' + moment(new Date(), 'ddd DD-MMM-YYYY, hh:mm A').format('hh:mm A') + '</span></div>';
        }
        $('.overflow').append(appendHtml);
        $('#bottom').focus();
        $('.msg_card_body').animate({
            scrollTop: $('.msg_card_body').prop("scrollHeight")
        }, 0);
    }


    //I added event handler for the file upload control to access the files properties.
    document.addEventListener("DOMContentLoaded", init, false);

    //To save an array of attachments
    var AttachmentArray = [];

    //counter for attachment array
    var arrCounter = 0;

    //to make sure the error message for number of files will be shown only one time.
    var filesCounterAlertStatus = false;

    //un ordered list to keep attachments thumbnails
    var ul = document.createElement("ul");
    ul.className = "thumb-Images";
    ul.id = "imgList";


    function init() {

        $(document).on('click', '#fileAttachmentBtn', function(e) {
            handleFileSelect(e);
        });
        //add javascript handlers for the file upload event
        // document
        //     .querySelector("#fileAttachmentBtn")
        //     .addEventListener("change", handleFileSelect, false);
    }

    //the handler for file upload event
    function handleFileSelect(e) {
        //to make sure the user select file/files
        if (!e.target.files) return;

        //To obtaine a File reference
        var files = e.target.files;

        // Loop through the FileList and then to render image files as thumbnails.
        for (var i = 0, f;
            (f = files[i]); i++) {
            //instantiate a FileReader object to read its contents into memory
            var fileReader = new FileReader();

            // Closure to capture the file information and apply validation.
            fileReader.onload = (function(readerEvt) {
                return function(e) {
                    //Apply the validation rules for attachments upload
                    ApplyFileValidationRules(readerEvt);

                    //Render attachments thumbnails.
                    RenderThumbnail(e, readerEvt);

                    //Fill the array of attachment
                    FillAttachmentArray(e, readerEvt);
                };
            })(f);

            // Read in the image file as a data URL.
            // readAsDataURL: The result property will contain the file/blob's data encoded as a data URL.
            // More info about Data URI scheme https://en.wikipedia.org/wiki/Data_URI_scheme
            fileReader.readAsDataURL(f);
        }
        document
            .getElementById("fileAttachmentBtn")
            .addEventListener("change", handleFileSelect, false);
    }

    //To remove attachment once user click on x button
    jQuery(function($) {
        $("div").on("click", ".img-wrap .close", function() {
            var id = $(this)
                .closest(".img-wrap")
                .find("img")
                .data("id");

            //to remove the deleted item from array
            var elementPos = AttachmentArray.map(function(x) {
                return x.FileName;
            }).indexOf(id);
            if (elementPos !== -1) {
                AttachmentArray.splice(elementPos, 1);
            }

            //to remove image tag
            $(this)
                .parent()
                .find("img")
                .not()
                .remove();

            //to remove div tag that contain the image
            $(this)
                .parent()
                .find("div")
                .not()
                .remove();

            //to remove div tag that contain caption name
            $(this)
                .parent()
                .parent()
                .find("div")
                .not()
                .remove();

            //to remove li tag
            var lis = document.querySelectorAll("#imgList li");
            for (var i = 0;
                (li = lis[i]); i++) {
                if (li.innerHTML == "") {
                    li.parentNode.removeChild(li);
                }
            }
        });
    });

    //Apply the validation rules for attachments upload
    function ApplyFileValidationRules(readerEvt) {
        //To check file type according to upload conditions
        if (CheckFileType(readerEvt.type) == false) {
            showError("The file (" +
                readerEvt.name +
                ") does not match the upload conditions, You can only upload jpg/png/gif files");

            e.preventDefault();
            return;
        }

        //To check file Size according to upload conditions
        if (CheckFileSize(readerEvt.size) == false) {
            showError("The file (" +
                readerEvt.name +
                ") does not match the upload conditions, The maximum file size for uploads should not exceed 300 KB");


            e.preventDefault();
            return;
        }

        //To check files count according to upload conditions
        if (CheckFilesCount(AttachmentArray) == false) {
            if (!filesCounterAlertStatus) {
                filesCounterAlertStatus = true;
                showError('You have added more than 10 files. According to upload conditions you can upload 10 files maximum');

            }
            e.preventDefault();
            return;
        }
    }

    //To check file type according to upload conditions
    function CheckFileType(fileType) {
        if (fileType == "image/jpeg") {
            return true;
        } else if (fileType == "image/png") {
            return true;
        } else if (fileType == "image/gif") {
            return true;
        } else {
            return false;
        }
        return true;
    }

    //To check file Size according to upload conditions
    function CheckFileSize(fileSize) {
        if (fileSize < 300000) {
            return true;
        } else {
            return false;
        }
        return true;
    }

    //To check files count according to upload conditions
    function CheckFilesCount(AttachmentArray) {
        //Since AttachmentArray.length return the next available index in the array,
        //I have used the loop to get the real length
        var len = 0;
        for (var i = 0; i < AttachmentArray.length; i++) {
            if (AttachmentArray[i] !== undefined) {
                len++;
            }
        }
        //To check the length does not exceed 10 files maximum
        if (len > 9) {
            return false;
        } else {
            return true;
        }
    }

    //Render attachments thumbnails.
    function RenderThumbnail(e, readerEvt) {
        var li = document.createElement("li");
        ul.appendChild(li);
        li.innerHTML = [
            '<div class="img-wrap"> <span class="close">&times;</span>' +
            '<img class="thumb" src="',
            e.target.result,
            '" title="',
            escape(readerEvt.name),
            '" data-id="',
            readerEvt.name,
            '"/>' + "</div>"
        ].join("");

        var div = document.createElement("div");
        div.className = "FileNameCaptionStyle";
        li.appendChild(div);
        div.innerHTML = [readerEvt.name].join("");
        document.getElementById("Filelist").insertBefore(ul, null);
    }

    //Fill the array of attachment
    function FillAttachmentArray(e, readerEvt) {
        AttachmentArray[arrCounter] = {
            AttachmentType: 1,
            ObjectType: 1,
            FileName: readerEvt.name,
            FileDescription: "Attachment",
            NoteText: "",
            MimeType: readerEvt.type,
            Content: e.target.result.split("base64,")[1],
            FileSizeInBytes: readerEvt.size
        };
        arrCounter = arrCounter + 1;
    }
</script>
<script>
    $(document).on('click', '.selectedOption', function() {
        var post_id = $(this).attr('data-post-id');
        var option_index = $(this).attr('data-index');
        var option = $(this).attr('data-option');


        var options = $('.post_' + post_id + ' label');
        // $(options[option_index]).click();



        $.ajax({
            url: '{{ route("post.poll.analysis") }}',
            type: 'POST',
            data: {
                post_id: post_id,
                option_index: option_index,
                option: option
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },

            success: function(resp) {
                if (resp.success == 'done') {
                    $('.post_' + post_id + ' .poll-area').css('pointer-events', 'none');
                    for (let k = 0; k < options.length; k++) {
                        options[k].classList.add("selectall");
                        options[k].classList.add("selected");
                        $('.post_' + post_id + ' .circle').remove();
                        $('.post_' + post_id + ' .text').css('padding-left', '9px');
                    }

                    $('.percent_' + post_id + '_1').text(Math.round(resp.analysis.A) + '%');
                    $('.percent_' + post_id + '_2').text(Math.round(resp.analysis.B) + '%');
                    $('.percent_' + post_id + '_3').text(Math.round(resp.analysis.C) + '%');
                    $('.percent_' + post_id + '_4').text(Math.round(resp.analysis.D) + '%');


                    // $('#progress_' + post_id + '_1').css('--w', Math.round(resp.analysis.A));
                    // $('#progress_' + post_id + '_2').css('--w', Math.round(resp.analysis.B));
                    // $('#progress_' + post_id + '_3').css('--w', Math.round(resp.analysis.C));
                    // $('#progress_' + post_id + '_4').css('--w', Math.round(resp.analysis.D));

                    $('#percentage_bar_' + post_id + '_1').css('width', Math.round(resp.analysis.A)+'%');
                    $('#percentage_bar_' + post_id + '_2').css('width', Math.round(resp.analysis.B)+'%');
                    $('#percentage_bar_' + post_id + '_3').css('width', Math.round(resp.analysis.C)+'%');
                    $('#percentage_bar_' + post_id + '_4').css('width', Math.round(resp.analysis.D)+'%');

                } else {
                    console.log('error');
                }

            }
        })
    });
    $(document).on('click', '.save_post', function() {
        var post = '';
        var type = $(this).attr('data-type');
        var url = '{{ route("post.save") }}';

        var msg = '';
        if (type == 'post') {
            post = $('#post').val();

            var filedata = $('#fileAttachmentBtn')[0].files[0];
            if (post == '' && $('#fileAttachmentBtn').val() == '') {
                showError('Enter description or upload atleast one photo before save!');
                return false;
            }
            var postData = new FormData();
            if ($('#fileAttachmentBtn').val() != '') {
                postData.append('photo', filedata);
            }

            postData.append('type', type);
            postData.append('post', post);


            msg = 'Post';
        }

        if (type == 'article') {
            post = CKEDITOR.instances.editor.getData();
            var title = $('#title').val();

            if (post == '' && title == '') {
                showError('Enter title & description before save!');
                return false;
            }
            var postData = new FormData();
            postData.append('type', type);
            postData.append('post', post);
            postData.append('title', title);

            msg = 'Article';
        }

        if (type == 'poll') {

            var que = $('.que').val();
            var ans = $("input[name='ans[]']").map(function() {
                return $(this).val();
            }).get();


            if (que == '' && $("input[name='ans[]']").val() == '') {
                showError('Enter Question & Poll Option before save!');
                return false;
            }


            var postData = new FormData();
            postData.append('que', que);
            postData.append('ans', ans);
            postData.append('type', 'poll');

            msg = 'Poll';
        }

        getDataByAjaxImage(url, postData, 'POST', msg + ' Share Successfully.');
        $('.que').val('');
        CKEDITOR.instances.editor.setData('');
        $('.ans').val('');

        window.location.reload();
    });


    $(document).on('click', '.show-btn', function() {
        var id = $(this).attr('data-id');
        var Fixid = $(this).attr('data-type');
        if (Fixid == 'descshow') {
            $('#' + Fixid + id).hide();
            $('#descless' + id).show();
        } else {
            $('#descless' + id).hide();
            $('#descshow' + id).show();
        }
    });
    $(document).on('click', '.opencomment', function() {
        var id = $(this).attr('data-id');
        if ($('#commentList' + id).is(':empty')) {} else {
            $('#commentList' + id).html('');
            return false;
        }
        $.ajax({
            url: '{{ route("post.get-comment") }}',
            type: 'POST',
            data: {
                id: id
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },

            success: function(resp) {

                if (resp.success == 'done') {
                    $('#commentList' + id).html(resp.html);


                } else {
                    $('#commentList' + id).html('');
                }

            }
        })

    });
    $(document).on('click', '.clickLike', function() {

        var id = $(this).attr('data-id');
        var count = $(this).attr('data-count');
        var is_like = $(this).attr('data-is-like');
        console.log(id);
        var url = '{{ route("post.like") }}';
        var peram = {
            post_id: id
        };
        console.log(count);
        var counts = parseInt(count) + parseInt(1);
        var countsM = parseInt(count) - parseInt(1);
        // data-is-like
        console.log(counts);
        getDataByAjaxWithoutLoaderAppend(url, peram, 'POST', '');
        if (is_like == 0) {
            $('.icon' + id).removeClass('feather-heart');
            $('.icon' + id).addClass('fa fa-heart');
            $('.value' + id).html('&nbsp;' + counts);
            $(this).attr("data-is-like", "1");
            $(this).attr("data-count", counts);

        } else {
            $('.icon' + id).removeClass('fa fa-heart');
            $('.icon' + id).addClass('feather-heart');
            if (countsM != 0) {
                $('.value' + id).html('&nbsp;' + countsM);
            } else {
                $('.value' + id).html('&nbsp;');
            }

            $(this).attr("data-is-like", "0");
            $(this).attr("data-count", countsM);
        }

    });
</script>
<script>
    CKEDITOR.replace('editor', {
        skin: 'moono',
        enterMode: CKEDITOR.ENTER_BR,
        shiftEnterMode: CKEDITOR.ENTER_P,
        toolbar: [{
                name: 'basicstyles',
                groups: ['basicstyles'],
                items: ['Bold', 'Italic', 'Underline', "-", 'TextColor', 'BGColor']
            },
            {
                name: 'styles',
                items: ['Format', 'Font', 'FontSize']
            },
            {
                name: 'scripts',
                items: ['Subscript', 'Superscript']
            },
            {
                name: 'justify',
                groups: ['blocks', 'align'],
                items: ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock']
            },
            {
                name: 'paragraph',
                groups: ['list', 'indent'],
                items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent']
            },
            {
                name: 'links',
                items: ['Link', 'Unlink']
            },
            {
                name: 'insert',
                items: ['Image']
            },
            {
                name: 'spell',
                items: ['jQuerySpellChecker']
            },
            {
                name: 'table',
                items: ['Table']
            }
        ],
    });
</script>


<script>
    $(document).ready(function() {
        var limit = 2;
        var start = 0;
        var action = 'inactive';

        function load_post_data(limit, start) {

            var url = '{{ route("post.get") }}';
            var peram = {
                limit: limit,
                start: start,
            };
            var method = 'POST';

            $.ajax({
                url: url,
                type: method,
                data: peram,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },

                success: function(resp) {
                    $('#load_data').append(resp.html);
                    if (resp.success != 'done') {
                        $('#load_data_message').html('');
                        action = 'active';
                    } else {
                        $('#load_data_message').html("<p style='text-align: center; font-weight: bold;font-size: 18px;'><i class='fa fa-spinner fa-spin ' ></i>&nbsp;&nbsp;Please Wait....</p>");
                        action = 'inactive';
                    }

                }
            })



        }

        if (action == 'inactive') {
            action = 'active';
            load_post_data(limit, start);
        }
        console.log(action);
        $(window).scroll(function() {
            if ($(window).scrollTop() + $(window).height() > $("#load_data").height() && action == 'inactive') {
                action = 'active';
                start = start + limit;
                setTimeout(function() {
                    $('#load_data_message').html("<p style='text-align: center; font-weight: bold;font-size: 18px;'><i class='fa fa-spinner fa-spin ' ></i>&nbsp;&nbsp;Please Wait....</p>");
                    $("#Serach").val('');
                    load_post_data(limit, start);
                }, 1000);

            }
        });

    });
</script>

<script>
    $(document).on('keydown', '.comments_filed', function(e) {
        if (event.which == 13) {
            var comment = $(this).val();
            var post_id = $(this).attr('data-post-id');
            send_comment(comment, post_id);

        }
    });

    function send_comment(comment, post_id) {
        // var comment = $('.comments_filed').val();
        // var post_id = $('.comments_filed').attr('data-post-id');
        var url = '{{route("post.save-comment")}}'
        var peram = {
            comment: comment,
            post_id: post_id
        };

        var method = 'POST';
        var msg = 'Comment send successfully';

        getDataByAjax(url, peram, method, msg)
        append_comment(peram);
        $('.comments_filed').val('');
    }


    function append_comment(peram) {
        var htmlComment = '<div class=""><div class="py-3"><div class="d-flex comment"><img class="rounded-circle comment-img" src="{{ asset("upload/users") }}/{{ auth()->user()->photo }}"><div class="flex-grow-1 ms-3 postComment"><div class="mb-1" style="color:#0172BD;font-weight:bold"> {{ auth()->user()->name }} <span class="ml-auto small" style="float: right;color: #000;"> ' + moment(new Date(), 'ddd DD-MMM-YYYY, hh:mm A').format('hh:mm A') + '</span></div><div class="mb-2">' + peram.comment + '</div></div>';
        $('#commentList' + peram.post_id + ' .comments ').prepend(htmlComment);
    }
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
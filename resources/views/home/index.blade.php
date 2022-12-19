@include('include.header')
<script src="https://cdn.ckeditor.com/4.8.0/full-all/ckeditor.js"></script>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }


    .wrapper {
        /* background: #fff;
  border-radius: 15px;
  padding: 25px;
  max-width: 380px;
  width: 100%;
  box-shadow: 0px 5px 10px rgba(0,0,0,0.1); */
    }

    .wrapper header {
        font-size: 22px;
        font-weight: 600;
    }

    .wrapper .poll-area {
        margin: 20px 0 15px 0;
    }

    .poll-area label {
        display: block;
        margin-bottom: 10px;
        border-radius: 5px;
        padding: 8px 15px;
        border: 2px solid #e6e6e6;
        transition: all 0.2s ease;
        cursor: pointer;
    }

    .poll-area label:hover {
        border-color: #ddd;
    }

    label.selected {
        border-color: #0172BC !important;
    }

    label .row {
        display: flex;
        pointer-events: none;
        justify-content: space-between;
    }

    label .row .column {
        display: flex;
        align-items: center;
    }

    label .row .circle {
        height: 19px;
        width: 19px;
        display: block;
        border: 2px solid #ccc;
        border-radius: 50%;
        margin-right: 10px;
        position: relative;
    }

    label.selected .row .circle {
        border-color: #0172BC;
    }

    label .row .circle::after {
        content: "";
        height: 11px;
        width: 11px;
        background: #0172BC;
        border-radius: inherit;
        position: absolute;
        left: 2px;
        top: 2px;
        display: none;
    }

    .poll-area label:hover .row .circle::after {
        display: block;
        background: #e6e6e6;
    }

    label.selected .row .circle::after {
        display: block;
        background: #0172BC !important;
    }

    label .row span {
        font-size: 16px;
        font-weight: 500;
    }

    label .row .percent {
        display: none;
    }

    label .progress {
        height: 7px;
        width: 100%;
        position: relative;
        background: #f0f0f0;
        margin: 8px 0 3px 0;
        border-radius: 30px;
        display: none;
        pointer-events: none;
    }

    label .progress:after {
        position: absolute;
        content: "";
        height: 100%;
        background: #ccc;
        width: calc(1% * var(--w));
        border-radius: inherit;
        transition: all 0.2s ease;
    }

    label.selected .progress::after {
        background: #0172BC;
    }

    label.selectall .progress,
    label.selectall .row .percent {
        display: block;
    }

    input[type="radio"],
    input[type="checkbox"] {
        display: none;
    }
</style>

<style>
    .comment img {
        width: 3rem;
        height: 3rem;
    }

    .comment-replies img {
        width: 1.75rem;
        height: 1.75rem;
    }

    .form-control {
        background-color: rgba(#ffffff, .05);
    }

    .ms-3 {
        margin-left: 1rem !important;
    }

    .flex-grow-1 {
        flex-grow: 1 !important;
    }

    .mb-2 {
        margin-bottom: 0.5rem !important;
    }

    .align-items-center {
        align-items: center !important;
    }

    .hstack {
        display: flex;
        flex-direction: row;
        align-items: center;
        align-self: stretch;
    }

    .me-2 {
        margin-right: 0.5rem !important;
    }

    .me-3 {
        margin-right: 1rem !important;
    }

    .me-4 {
        margin-right: 1.5rem !important;
    }

    .text-muted {
        --bs-text-opacity: 1;
        color: #adb5bd !important;
    }

    .link-primary {
        color: #0172BC
    }

    .link-secondary {
        color: #0172BC;
    }
</style>
<div class="py-4">
    <div class="container">
        <div class="row">

            <main class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
                <div class="box shadow-sm border rounded bg-white mb-3 osahan-share-post">
                    <ul class="nav nav-justified border-bottom osahan-line-tab" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="feather-edit"></i> Share a post</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false"><i class="feather-clipboard"></i> Write an article</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="poll-tab" data-toggle="tab" href="#poll" role="tab" aria-controls="poll" aria-selected="false"><i class="feather-clipboard"></i> Share a poll</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="p-3 d-flex align-items-center w-100" href="#">

                                <div class="w-100">
                                    <textarea id="post" placeholder="Write your thoughts..." class="form-control border-0 p-0 shadow-none" rows="6"></textarea>
                                    <div style="float: right;padding: 0 !important;">
                                        <label data-toggle="tooltip" data-placement="top" data-original-title="Upload New Picture" class="btn btn-info m-0" for="fileAttachmentBtn">
                                            <i class="feather-image"></i>
                                            <input id="fileAttachmentBtn" name="photo" type="file" class="d-none">
                                        </label>
                                        <!-- <button data-toggle="tooltip" data-placement="top" data-original-title="Delete" type="submit" class="btn btn-danger"><i class="feather-trash-2"></i></button> -->
                                    </div>
                                </div>
                            </div>
                            <div class="border-top p-3 d-flex align-items-center">
                                <div class="mr-auto">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" onerror="this.onerror=null;this.src='https://cdn-icons-png.flaticon.com/512/3135/3135715.png';" src="{{ asset('upload/users/')}}/{{ auth()->user()->photo }}" alt="">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                </div>
                                <div class="flex-shrink-1">

                                    <button type="button" data-type="post" class="btn btn-primary btn-sm save_post">Share Post</button>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="p-3 w-100">
                                <input type="text" class="form-control border  p-0 shadow-none" placeholder="Enter article title" style="padding: 10px !important;border-color: gainsboro !important;margin-bottom: 15px;" name="title" id="title">
                                <textarea id="editor" placeholder="Write an article..." class="form-control border-0 p-0 shadow-none" rows="6"></textarea>
                            </div>
                            <div class="border-top p-3 d-flex align-items-center">
                                <div class="mr-auto">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" onerror="this.onerror=null;this.src='https://cdn-icons-png.flaticon.com/512/3135/3135715.png';" src="{{ asset('upload/users/')}}/{{ auth()->user()->photo }}" alt="">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                </div>
                                <div class="flex-shrink-1">

                                    <button type="button" data-type="article" class="btn btn-primary btn-sm save_post">Share Article</button>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="poll" role="tabpanel" aria-labelledby="poll-tab">
                            <div class="p-3 w-100">
                                <input name="que" required placeholder="Write a poll..." class="que form-control shadow-none" />
                            </div>
                            <div class="p-3 w-100">
                                <input name="ans[]" required placeholder="Write a option A..." class="ans form-control  shadow-none" />
                            </div>
                            <div class="p-3 w-100">
                                <input name="ans[]" required placeholder="Write a option B..." class="ans form-control  shadow-none" />
                            </div>
                            <div class="p-3 w-100">
                                <input name="ans[]" required placeholder="Write a option C..." class="ans form-control  shadow-none" />
                            </div>
                            <div class="p-3 w-100">
                                <input name="ans[]" required placeholder="Write a option D..." class="ans form-control shadow-none" />
                            </div>

                            <div class="border-top p-3 d-flex align-items-center">
                                <div class="mr-auto">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" onerror="this.onerror=null;this.src='https://cdn-icons-png.flaticon.com/512/3135/3135715.png';" src="{{ asset('upload/users/')}}/{{ auth()->user()->photo }}" alt="">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                </div>
                                <div class="flex-shrink-1">

                                    <button type="button" data-type="poll" class="btn btn-primary btn-sm save_post">Share Poll</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="box   rounded  mb-3 osahan-post" id="load_data">
                    <!-- -//--Post Data------->
                </div>
                <div id="load_data_message"></div>
            </main>
            <aside class="col col-xl-3 order-xl-1 col-lg-6 order-lg-2 col-md-6 col-sm-6 col-12">
                <div class="box mb-3 shadow-sm border rounded bg-white profile-box text-center">
                    <div class="py-4 px-3 border-bottom">
                        <img onerror="this.onerror=null;this.src='https://cdn-icons-png.flaticon.com/512/3135/3135715.png';" src="{{ asset('upload/users/')}}/{{ auth()->user()->photo }}" class="img-fluid mt-2 rounded-circle" alt="Responsive image">
                        <h5 class="font-weight-bold text-dark mb-1 mt-4">{{ auth()->user()->name }}</h5>
                        <p class="mb-0 text-muted">{{ auth()->user()->headline }}</p>
                    </div>
                    <div class="d-flex">
                        <div class="col-12 border-right p-3">
                            <h6 class="font-weight-bold text-dark mb-1">{{ COUNT($connection) }}</h6>
                            <p class="mb-0 text-black-50 small">Connections</p>
                        </div>
                        <!-- <div class="col-6 p-3">
                                <h6 class="font-weight-bold text-dark mb-1">85</h6>
                                <p class="mb-0 text-black-50 small">Views</p>
                            </div> -->
                    </div>
                    <div class="overflow-hidden border-top">
                        <a class="font-weight-bold p-3 d-block" href="{{ route('profile.index',Crypt::encryptString(auth()->user()->id)) }}"> View my profile </a>
                    </div>
                </div>
                <div class="box mb-3 shadow-sm rounded bg-white view-box overflow-hidden">
                    <div class="box-title border-bottom p-3">
                        <h6 class="m-0">Profile Views</h6>
                    </div>
                    <div class="d-flex text-center">
                        <div class="col-6 border-right py-4 px-2">
                            <h5 class="font-weight-bold text-info mb-1">08 <i class="feather-bar-chart-2"></i></h5>
                            <p class="mb-0 text-black-50 small">last 5 days</p>
                        </div>
                        <div class="col-6 py-4 px-2">
                            <h5 class="font-weight-bold text-success mb-1">+ 43% <i class="feather-bar-chart"></i></h5>
                            <p class="mb-0 text-black-50 small">Since last week</p>
                        </div>
                    </div>
                    <div class="overflow-hidden border-top text-center">
                        <img src="img/chart.png" class="img-fluid" alt="Responsive image">
                    </div>
                </div>

            </aside>
            <aside class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-6 col-12">
                <div class="box shadow-sm border rounded bg-white mb-3">
                    <div class="box-title border-bottom p-3">
                        <h6 class="m-0">People you might know</h6>
                    </div>
                    <div class="box-body p-3">
                        <div class="d-flex align-items-center osahan-post-header mb-3 people-list">
                            <div class="dropdown-list-image mr-3">
                                <img class="rounded-circle" src="img/p8.png" alt="">
                                <div class="status-indicator bg-success"></div>
                            </div>
                            <div class="font-weight-bold mr-2">
                                <div class="text-truncate">Sophia Lee</div>
                                <div class="small text-gray-500">Student at Harvard
                                </div>
                            </div>
                            <span class="ml-auto"><button type="button" class="btn btn-light btn-sm"><i class="feather-user-plus"></i></button>
                            </span>
                        </div>
                        <div class="d-flex align-items-center osahan-post-header mb-3 people-list">
                            <div class="dropdown-list-image mr-3">
                                <img class="rounded-circle" src="img/p9.png" alt="">
                                <div class="status-indicator bg-success"></div>
                            </div>
                            <div class="font-weight-bold mr-2">
                                <div class="text-truncate">John Doe</div>
                                <div class="small text-gray-500">Traveler
                                </div>
                            </div>
                            <span class="ml-auto"><button type="button" class="btn btn-light btn-sm"><i class="feather-user-plus"></i></button>
                            </span>
                        </div>
                        <div class="d-flex align-items-center osahan-post-header mb-3 people-list">
                            <div class="dropdown-list-image mr-3">
                                <img class="rounded-circle" src="img/p10.png" alt="">
                                <div class="status-indicator bg-success"></div>
                            </div>
                            <div class="font-weight-bold mr-2">
                                <div class="text-truncate">Julia Cox</div>
                                <div class="small text-gray-500">Art Designer
                                </div>
                            </div>
                            <span class="ml-auto"><button type="button" class="btn btn-light btn-sm"><i class="feather-user-plus"></i></button>
                            </span>
                        </div>
                        <div class="d-flex align-items-center osahan-post-header mb-3 people-list">
                            <div class="dropdown-list-image mr-3">
                                <img class="rounded-circle" src="img/p11.png" alt="">
                                <div class="status-indicator bg-success"></div>
                            </div>
                            <div class="font-weight-bold mr-2">
                                <div class="text-truncate">Robert Cook</div>
                                <div class="small text-gray-500">Photographer at Photography
                                </div>
                            </div>
                            <span class="ml-auto"><button type="button" class="btn btn-light btn-sm"><i class="feather-user-plus"></i></button>
                            </span>
                        </div>
                        <div class="d-flex align-items-center osahan-post-header people-list">
                            <div class="dropdown-list-image mr-3">
                                <img class="rounded-circle" src="img/p12.png" alt="">
                                <div class="status-indicator bg-success"></div>
                            </div>
                            <div class="font-weight-bold mr-2">
                                <div class="text-truncate">Richard Bell</div>
                                <div class="small text-gray-500">Graphic Designer at Envato
                                </div>
                            </div>
                            <span class="ml-auto"><button type="button" class="btn btn-light btn-sm"><i class="feather-user-plus"></i></button>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="box shadow-sm mb-3 rounded bg-white ads-box text-center">
                    <img src="img/job1.png" class="img-fluid" alt="Responsive image">
                    <div class="p-3 border-bottom">
                        <h6 class="font-weight-bold text-dark">Osahan Solutions</h6>
                        <p class="mb-0 text-muted">Looking for talent?</p>
                    </div>
                    <div class="p-3">
                        <button type="button" class="btn btn-outline-primary pl-4 pr-4"> POST A JOB </button>
                    </div>
                </div>

            </aside>
        </div>
    </div>
</div>
@include('include.footer')


<script>
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

            if (que == '' && ans == '') {
                showError('Enter title & Option before save!');
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
        var htmlComment = '<div class=""><div class="py-3"><div class="d-flex comment"><img class="rounded-circle comment-img" src="{{ asset("upload/users") }}/{{ auth()->user()->photo }}"><div class="flex-grow-1 ms-3"><div class="mb-1" style="color:#0172BD;font-weight:bold"> {{ auth()->user()->name }} <span class="text-muted text-nowrap" style="float: right;"> ' + moment(new Date(), 'ddd DD-MMM-YYYY, hh:mm A').format('hh:mm A') + '</span></div><div class="mb-2">' + peram.comment + '</div></div>';
        $('#commentList' + peram.post_id + ' .comments ').prepend(htmlComment);
    }
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
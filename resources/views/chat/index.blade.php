@include('include.header')
<style>
.dd-flex{
    display: flex;
}
    </style>
<div class="py-4">
    <div class="container">
        <div class="row">

            <main class="col col-xl-9 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
                <div class="box shadow-sm rounded bg-white mb-3 osahan-chat">
                    <h5 class="pl-3 pt-3 pr-3 border-bottom mb-0 pb-3">Messaging</h5>
                    <div class="row m-0">
                        <div class="border-right col-lg-5 col-xl-4 px-0">
                            <div class="osahan-chat-left">
                                <div class="position-relative icon-form-control p-3 border-bottom">
                                    <i class="feather-search position-absolute"></i>
                                    <input placeholder="Search messages" type="text" class="form-control" id="Serach">
                                </div>
                                <div class="osahan-chat-list" id="chatList">
                                    @if(!empty($user))
                                    @foreach($user as $row)
                                    @if(auth()->user()->id != $row->id)
                                    <div class="p-3 dd-flex align-items-center border-bottom osahan-post-header overflow-hidden userlist">
                                        <div class="dropdown-list-image mr-3"><img class="rounded-circle" src="{{ asset('upload/users/')}}/{{ $row->photo }}" alt=""></div>
                                        <div class="font-weight-bold mr-1 overflow-hidden">
                                            <div class="text-truncate">{{$row->name}}</div>
                                            <div class="small text-truncate overflow-hidden text-black-50"><i class="feather-check text-primary"></i> Pellentesque semper ex diam, at tristique ipsum varius sed. Pellentesque non metus ullamcorper</div>
                                        </div>
                                        <span class="ml-auto mb-auto">
                                            <div class="text-right text-muted pt-1 small">00:21PM</div>
                                        </span>
                                    </div>
                                    @endif
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-xl-8 px-0">
                            <div class="p-3 d-flex align-items-center  border-bottom osahan-post-header">
                                <div class="font-weight-bold mr-1 overflow-hidden">
                                    <div class="text-truncate">Carl Jenkins
                                    </div>
                                    <div class="small text-truncate overflow-hidden text-black-50">Askbootstap.com - Become a Product Manager with super power</div>
                                </div>
                                <span class="ml-auto">
                                    <button type="button" class="btn btn-light btn-sm rounded">
                                        <i class="feather-phone"></i>
                                    </button>
                                    <button type="button" class="btn btn-light btn-sm rounded">
                                        <i class="feather-video"></i>
                                    </button>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-light btn-sm rounded" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="feather-more-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <button class="dropdown-item" type="button"><i class="feather-trash"></i> Delete</button>
                                            <button class="dropdown-item" type="button"><i class="feather-x-circle"></i> Turn Off</button>
                                        </div>
                                    </div>
                                </span>
                            </div>
                            <div class="osahan-chat-box p-3 border-top border-bottom bg-light">
                                <div class="text-center my-3">
                                    <span class="px-3 py-2 small bg-white shadow-sm  rounded">DEC 21, 2020</span>
                                </div>
                                <div class="d-flex align-items-center osahan-post-header">
                                    <div class="dropdown-list-image mr-3 mb-auto"><img class="rounded-circle" src="{{ asset('img/p1.png')}}" alt=""></div>
                                    <div class="mr-1">
                                        <div class="text-truncate h6 mb-3">Carl Jenkins
                                        </div>
                                        <p>Hi Marie</p>
                                        <p>welcome to Live Chat! My name is Jason. How can I help you today?
                                            <a href="#"><span class="__cf_email__" data-cfemail="c5aca4a8aab6a4ada4ab85a2a8a4aca9eba6aaa8">[email&#160;protected]</span></a>
                                        </p>
                                    </div>
                                    <span class="ml-auto mb-auto">
                                        <div class="text-right text-muted pt-1 small">00:21PM</div>
                                    </span>
                                </div>
                                <div class="text-center my-3">
                                    <span class="px-3 py-2 small bg-white shadow-sm rounded">DEC 22, 2020</span>
                                </div>
                                <div class="d-flex align-items-center osahan-post-header">
                                    <div class="dropdown-list-image mr-3 mb-auto"><img class="rounded-circle" src="{{ asset('img/p8.png')}}" alt=""></div>
                                    <div class="mr-1">
                                        <div class="text-truncate h6 mb-3">Jack P. Angulo
                                        </div>
                                        <p>Hi, I wanted to check my order status. My order number is 0009483021 😀</p>
                                    </div>
                                    <span class="ml-auto mb-auto">
                                        <div class="text-right text-muted pt-1 small">00:21PM</div>
                                    </span>
                                </div>
                                <div class="text-center my-3">
                                    <span class="px-3 py-2 small bg-white shadow-sm rounded">DEC 23, 2020</span>
                                </div>
                                <div class="d-flex align-items-center osahan-post-header">
                                    <div class="dropdown-list-image mr-3 mb-auto"><img class="rounded-circle" src="{{ asset('img/p1.png')}}" alt=""></div>
                                    <div class="mr-1">
                                        <div class="text-truncate h6 mb-3">Carl Jenkins
                                        </div>
                                        <p>Is there anything else that I can do for you?</p>
                                        <p>wI understand your concern… I wouldn’t want my child’s gift to arrive late either. It looks like your order is set to arrive in 2 business days, so it should arrive by Friday, just in time!</p>
                                    </div>
                                    <span class="ml-auto mb-auto">
                                        <div class="text-right text-muted pt-1 small">00:21PM</div>
                                    </span>
                                </div>
                                <div class="text-center my-3">
                                    <span class="px-3 py-2 small bg-white shadow-sm rounded">DEC 24, 2020</span>
                                </div>
                                <div class="d-flex align-items-center osahan-post-header">
                                    <div class="dropdown-list-image mr-3 mb-auto"><img class="rounded-circle" src="{{ asset('img/p8.png')}}" alt=""></div>
                                    <div class="mr-1">
                                        <div class="text-truncate h6 mb-3">Jack P. Angulo
                                        </div>
                                        <p>Great, thank you! Yes, I also wanted to make sure I entered the right shipping address. My address is 12390 Mulberry Ln, Coral Springs, FL 33067. Is that where it’s being shipped to?
                                        </p>
                                    </div>
                                    <span class="ml-auto mb-auto">
                                        <div class="text-right text-muted pt-1 small">00:21PM</div>
                                    </span>
                                </div>
                            </div>
                            <div class="w-100 border-top border-bottom">
                                <textarea placeholder="Write a message…" class="form-control border-0 p-3 shadow-none" rows="2"></textarea>
                            </div>
                            <div class="p-3 d-flex align-items-center">
                                <div class="overflow-hidden">
                                    <button type="button" class="btn btn-light btn-sm rounded">
                                        <i class="feather-image"></i>
                                    </button>
                                    <button type="button" class="btn btn-light btn-sm rounded">
                                        <i class="feather-paperclip"></i>
                                    </button>
                                    <button type="button" class="btn btn-light btn-sm rounded">
                                        <i class="feather-camera"></i>
                                    </button>
                                </div>
                                <span class="ml-auto">
                                    <button type="button" class="btn btn-primary btn-sm rounded">
                                        <i class="feather-send"></i> Send
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <aside class="col col-xl-3 order-xl-2 col-lg-12 order-lg-2 col-12">
                <div class="box mb-3 shadow-sm border rounded bg-white list-sidebar">
                    <div class="box-title p-3">
                        <h6 class="m-0">Manage my network</h6>
                    </div>
                    <ul class="list-group list-group-flush">
                        <a href="#">
                            <li class="list-group-item pl-3 pr-3 d-flex align-items-center text-dark"><i class="feather-users mr-2 text-dark"></i> Connections <span class="ml-auto font-weight-bold">{{ count($connection) }}</span></li>
                        </a>
                        <a href="#">
                            <li class="list-group-item pl-3 pr-3 d-flex align-items-center text-dark"><i class="feather-book mr-2 text-dark"></i> Invitation Sent <span class="ml-auto font-weight-bold">{{ count($invitation_send) }}</span></li>
                        </a>
                        <a href="#">
                            <li class="list-group-item pl-3 pr-3 d-flex align-items-center text-dark"><i class="feather-book mr-2 text-dark"></i> Invitation Recived <span class="ml-auto font-weight-bold">{{ count($invitation_recived) }}</span></li>
                        </a>
                        <a href="#">
                            <li class="list-group-item pl-3 pr-3 d-flex align-items-center text-dark"><i class="feather-user-check mr-2 text-dark"></i> Company I Follow <span class="ml-auto font-weight-bold">0</span></li>
                        </a>

                        <a href="#">
                            <li class="list-group-item pl-3 pr-3 d-flex align-items-center text-dark"><i class="feather-clipboard mr-2 text-dark"></i> Page <span class="ml-auto font-weight-bold">0</span></li>
                        </a>
                        <a href="#">
                            <li class="list-group-item pl-3 pr-3 d-flex align-items-center text-dark"><i class="feather-tag mr-2 text-dark"></i> Hashtag <span class="ml-auto font-weight-bold">0</span></li>
                        </a>
                    </ul>
                </div>
                <div class="box shadow-sm mb-3 border rounded bg-white ads-box text-center">
                    <div class="image-overlap-2 pt-4">
                        <img src="{{ asset('img/logo.png') }}" class="img-fluid rounded-circle shadow-sm" alt="Responsive image">
                        <img onerror="this.onerror=null;this.src='https://cdn-icons-png.flaticon.com/512/3135/3135715.png';" src="{{ asset('upload/users/')}}/{{ auth()->user()->photo }}" class="img-fluid rounded-circle shadow-sm" alt="Responsive image">
                    </div>
                    <div class="p-3 border-bottom">
                        <h6 class="text-dark">{{auth()->user()->name}}, grow your career by following <span class="font-weight-bold"> {{ config('constant.PROJECT_NAME'); }}</span></h6>
                        <p class="mb-0 text-muted">Stay up-to industry trends!</p>
                    </div>
                    <!-- <div class="p-3">
                        <button type="button" class="btn btn-outline-primary btn-sm pl-4 pr-4"> FOLLOW </button>
                    </div> -->
                </div>
            </aside>
        </div>
    </div>
</div>
@include('include.footer')
<script>
 $("#Serach").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        console.log(value);
        $("#chatList .userlist").filter(function() {
            
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
    </script>

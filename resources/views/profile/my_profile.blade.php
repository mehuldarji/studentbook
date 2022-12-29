@include('include.header')
<div class="py-4">
    <div class="container">
        <div class="row">

            <aside class="col col-xl-3 order-xl-1 col-lg-12 order-lg-1 col-12">
                <div class="box mb-3 shadow-sm border rounded bg-white profile-box text-center">
                    <div class="py-4 px-3 border-bottom">
                        <img onerror="this.onerror=null;this.src='https://cdn-icons-png.flaticon.com/512/3135/3135715.png';" src="{{ asset('upload/users/')}}/{{ $user->photo }}" style="width: 135px; height: 135px;" id="img_prv" class="img-fluid rounded-circle" alt="Responsive image">
                        <h5 class="font-weight-bold text-dark mb-1 mt-4">{{ $user->name }}</h5>
                        <p class="mb-0 text-muted">{{ $user->headline }}</p>
                    </div>
                    <div class="d-flex">
                        <div class="col-6 border-right p-3">
                            <h6 class="font-weight-bold text-dark mb-1">358</h6>
                            <p class="mb-0 text-black-50 small">Connections</p>
                        </div>
                        <div class="col-6 p-3">
                            <h6 class="font-weight-bold text-dark mb-1">85</h6>
                            <p class="mb-0 text-black-50 small">Views</p>
                        </div>
                    </div>
                    <div class="overflow-hidden border-top">
                        @if(auth()->user()->id == $user->id)
                        <a class="font-weight-bold p-3 d-block" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" href="{{ route('logout') }}"> Log Out </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        @else
                        <div class="col-lg-12" style="display: flex;margin: 0px 0 7px 0;">
                            <button style="    margin-top: 8px;margin-right: 7px;" type="button" data-id="{{ $user->id }}" class="btn btn-primary btn-sm btn-block connect  "> Connect </button>
                            <a style="color:#fff" href="{{ route('chat.index') }}?t={{ base64_encode($user->id) }}" class="btn btn-primary btn-sm btn-block   "> Message </a>

                        </div>
                        @endif
                    </div>
                </div>

                <div class="box shadow-sm mb-3 rounded bg-white ads-box text-center overflow-hidden">
                    <img src="{{ asset('img/job1.png')}}" class="img-fluid" alt="Responsive image">
                    <div class="p-3 border-bottom">
                        <h6 class="font-weight-bold text-dark">Osahan Solutions</h6>
                        <p class="mb-0 text-muted">Looking for talent?</p>
                    </div>
                    <div class="p-3">
                        <button type="button" class="btn btn-outline-primary pl-4 pr-4"> POST A JOB </button>
                    </div>
                </div>
            </aside>
            <main class="col col-xl-6 order-xl-2 col-lg-12 order-lg-2 col-md-12 col-sm-12 col-12">
                <div class="box shadow-sm border rounded bg-white mb-3">
                    <div class="box-title border-bottom p-3">
                        <h6 class="m-0">About You</h6>
                    </div>
                    <div class="box-body p-3">
                        <p style="    white-space: pre-line;text-align: justify;">
                            {{ $user->about }}
                        </p>
                    </div>
                </div>

                <div class="box shadow-sm border rounded bg-white mb-3">
                    <div class="box-title border-bottom p-3">
                        <h6 class="m-0">Education</h6>
                    </div>
                    @if(count($user_education) > 0)
                    @foreach($user_education as $row)
                    <div class="box-body p-3 border-bottom">
                        <div class="d-flex align-items-top job-item-header pb-2">
                            <div class="mr-2">
                                <h6 class="font-weight-bold text-dark mb-0">{{ $row->institute }}</h6>
                                <div class="text-truncate text-primary">{{ $row->position }}</div>
                                <div class="small text-gray-500">{{ date('M Y', strtotime($row->from)) }} - {{ date('M Y', strtotime($row->to)) }}</div>
                            </div>
                            <!-- <img class="img-fluid ml-auto mb-auto" src="{{ asset('img/e1.png')}}" alt=""> -->
                        </div>
                    </div>
                    @endforeach
                    @endif

                </div>
            </main>
            <aside class="col col-xl-3 order-xl-3 col-lg-12 order-lg-3 col-12">
                <div class="box shadow-sm border rounded bg-white mb-3 peopleView">

                </div>
                <div class="box shadow-sm mb-3 rounded bg-white ads-box text-center overflow-hidden">
                    <img src="{{ asset('img/ads1.png')}}" class="img-fluid" alt="Responsive image">
                    <div class="p-3 border-bottom">
                        <h6 class="font-weight-bold text-gold">Osahanin Premium</h6>
                        <p class="mb-0 text-muted">Grow &amp; nurture your network</p>
                    </div>
                    <div class="p-3">
                        <button type="button" class="btn btn-outline-gold pl-4 pr-4"> ACTIVATE </button>
                    </div>
                </div>

            </aside>
        </div>
    </div>
</div>

@include('include.footer')
@include('home.javascript')
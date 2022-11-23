@if(count($user) > 0)
@foreach($user as $row)

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<?php
$folllowers = DB::select('SELECT count(*) as followers FROM `user_connections`  WHERE (connected_id = "' . $row->id . '" OR user_id = "' . $row->id . '") AND status = 1 limit 1');
$connection_id = DB::select('SELECT * FROM `user_connections` WHERE (user_id = "' . auth()->user()->id . '" AND connected_id = "' . $row->id . '") OR  (user_id = "' . $row->id . '" AND connected_id = "' . auth()->user()->id . '") AND status = 1 limit 1');

?>
<div class="col-md-4">

    <div class="border network-item rounded mb-3">
        <a href="{{ route('profile.index', Crypt::encryptString($row->id)) }}">
            <div class="p-3 d-flex align-items-center network-item-header">
                <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" onerror="this.onerror=null;this.src='https://cdn-icons-png.flaticon.com/512/3135/3135715.png';" src="{{ asset('upload/users/')}}/{{ $row->photo }}" alt="">
                </div>
                <div class="font-weight-bold">
                    <h6 class="font-weight-bold text-dark mb-0">{{ $row->name }}</h6>
                    <div class="small text-black-50">{{ $row->headline }}</div>
                </div>
            </div>
        </a>
        <div class="d-flex align-items-center p-3 border-top border-bottom network-item-body">

            <span class="font-weight-bold small text-primary" style="font-size: 13px;">@if($folllowers[0]->followers <= 0) New User in Platform @else {{ $folllowers[0]->followers}} Connections @endif</span>
        </div>
        <div class="network-item-footer py-3 d-flex text-center">
            <div class="col-12 ">
                <button type="button" data-id="{{ $connection_id[0]->id }}" data-msg="Unfollow Successfully" class="btn btn-primary btn-sm btn-block unfollow"> <i class="fa fa-check"></i> &nbsp; Following </button>
            </div>
        </div>
    </div>

</div>
@endforeach
@endif
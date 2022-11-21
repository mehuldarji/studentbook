@if(count($user) > 0)
@foreach($user as $row)

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



<div class="col-md-4">
    
        <div class="border network-item rounded mb-3">
            <div class="p-3 d-flex align-items-center network-item-header">
                <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" onerror="this.onerror=null;this.src='https://cdn-icons-png.flaticon.com/512/3135/3135715.png';" src="{{ asset('upload/users/')}}/{{ $row->photo }}" alt="">
                </div>
                <div class="font-weight-bold">
                    <h6 class="font-weight-bold text-dark mb-0">{{ $row->name }}</h6>
                    <div class="small text-black-50">{{ $row->headline }}</div>
                </div>
            </div>
            <div class="d-flex align-items-center p-3 border-top border-bottom network-item-body">
               
                <span class="font-weight-bold small text-primary" style="font-size: 13px;">@if($row->followers <= 0) New User in Platform @else {{ $row->followers}} Connections @endif</span>
            </div>
            <div class="network-item-footer py-3 d-flex text-center">
                <div class="col-12 pl-3 pr-1">
                    <button type="button" data-id="{{ $row->id }}" class="btn btn-primary btn-sm btn-block connect  @if($row->connection_id) disable-connect-btn @endif"> @if($row->connection_id) <i class="fa fa-clock"></i> &nbsp; Pending @else Connect @endif</button>
                </div>
                <!-- <div class="col-6 pr-3 pl-1">
                                                        <button type="button" class="btn btn-outline-primary btn-sm btn-block"> <i class="feather-user-plus"></i> Follow </button>
                                                    </div> -->
            </div>
        </div>
  
</div>
@endforeach
@endif
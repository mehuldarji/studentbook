<div class="box-title border-bottom p-3">
    <h6 class="m-0">Who viewed your profile</h6>
</div>
<div class="box-body p-3">
    @foreach($data as $row)


    <div class="d-flex align-items-center osahan-post-header mb-3 people-list">
        <a href="{{ route('profile.index',Crypt::encryptString($row->id)) }}">
            <div class="dropdown-list-image mr-3">
                <img class="rounded-circle" src="{{ asset('upload/users')}}/{{  $row->photo }}" alt="">
                <div class="status-indicator bg-success"></div>
            </div>
        </a>
        <a href="{{ route('profile.index',Crypt::encryptString($row->id)) }}" style="display: contents;">
            <div class="font-weight-bold mr-2">
                <div class="text-truncate">{{ $row->name }}</div>
                <div class="small text-gray-500">{{ $row->headline }}
                </div>
            </div>
        </a>

        <span class="ml-auto"><button type="button" data-id="{{  $row->id }}" class="btn btn-light btn-sm connect  " data-toggle="tooltip" data-placement="top" data-original-title="Connect"><i class="feather-user-plus"></i></button>
        </span>
    </div>


    @endforeach
</div>
<script>
    $(document).on('click', '.connect', function() {
        // $(this).parent('.people-list').remove();
        $(this).closest(".people-list").remove();
    });

    $(document).on('click', '.connect', function() {
        var connected_id = $(this).attr('data-id');
        var msg = $(this).attr('data-msg');
        // alert(msg);

        var url = '{{ route("connection.connected") }}';

        var peram = {
            connected_id: connected_id
        };

        if (msg == undefined) {
            msg = 'Request sent Successfully.';
            $(this).html('<i class="fa fa-clock"></i> &nbsp; Pending');
            $(this).addClass('disable-connect-btn');
        } else {
            msg = msg;
            $(this).parents('.col-md-4').remove();
        }

        getDataByAjax(url, peram, 'POST', msg);

    });
</script>

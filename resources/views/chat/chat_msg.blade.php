<div class="p-3 d-flex align-items-center  border-bottom osahan-post-header" >
    <div class="float-left hidden-xs d-flex ml-2">
        <div class="img_cont mr-3" style="    margin-right: 0.3rem!important;">
            <img src="{{ asset('upload/users/')}}/{{ $getData->photo }}" class="rounded-circle user_img" alt="img">
        </div>
        <div class="align-items-center mt-2">
            <h4 class=" mb-0 font-weight-semibold text-truncate"> {{ $getData->name }}</h4>
            <span class="fa fa-dot"></span><span class="mr-3 " style="font-size: 11px;"> {{ $getData->headline }}</span>
        </div>
    </div>
    <span class="ml-auto">


        <div class="btn-group">
            <button type="button" class="btn btn-light btn-sm rounded" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="feather-more-vertical"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-right">
                <button class="dropdown-item" type="button"><i class="feather-trash"></i> Delete All Message</button>
            </div>
        </div>
    </span>
</div>


                                        
                                     
<div class="card-body msg_card_body scroll-3">
<div class="overflow">
    <?php $t = 0;
    $display = 'N';
    $previousValue = '';
    ?>
    @if(!empty($msg))
    @foreach($msg as $row)
    <?php
    $ar = date("d-m-Y", strtotime($row->created_at));
    if ($t > 0) {
        $previousValue = date("d-m-Y", strtotime($msg[$t - 1]->created_at));
    }
    if ($previousValue != $ar) {
        $display = 'Y';
    } else {
        $display = 'N';
    }
    if ($previousValue == $ar) {
        $display = 'N';
    }

    ?>
    @if ($display == 'Y')
    <div class="text-center my-3">
        <span class="px-3 py-2 small bg-white shadow-sm  rounded">{{ date('M d, Y',strtotime($row->created_at)); }}</span>
    </div>
    @endif
    @if($row->from_id != auth()->user()->id)
    <div class="d-flex justify-content-start">
        <div class="img_cont_msg">
            <img src="{{ asset('upload/users/')}}/{{ $row->photo }}" class="rounded-circle user_img_msg" alt="img">
        </div>
        <div class="msg_cotainer">
            {{ $row->body }}
            <span class="msg_time"> {{ date('h:i A',strtotime($row->created_at)); }}</span>
        </div>
    </div>
    @endif
    @if($row->from_id == auth()->user()->id)
    <div class="d-flex justify-content-end ">
        <div class="msg_cotainer_send">
            {{ $row->body }}
            <span class="msg_time_send"> {{ date('h:i A',strtotime($row->created_at)); }}</span>
        </div>
        <div class="img_cont_msg">
            <img src="{{ asset('upload/users/')}}/{{ $row->photo }}" class="rounded-circle user_img_msg" alt="img">
        </div>
    </div>
    @endif
    <?php $t++; ?>
    @endforeach
    @endif
    
</div>
<div id="bottom"></div>
</div>


<div class="w-100 border-top border-bottom">
    <input type="hidden" name="to_id" id="to_id" value="{{ $getData->id }}">
    <textarea id="body" placeholder="Write a message…" name="body" class="form-control border-0 p-3 shadow-none" rows="1"></textarea>
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
        <button type="button" class="btn btn-primary btn-sm rounded send_message">
            <i class="feather-send"></i> Send
        </button>
    </span>
</div>
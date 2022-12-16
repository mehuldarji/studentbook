<div class="p-3 d-flex align-items-center  border-bottom osahan-post-header">
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
    <div class="overflow" id="message-box">
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
</div>
<div class="typing" style="display: none;">

    <span class="dot-1">●</span>
    <span class="dot-2">●</span>
    <span class="dot-3">●</span>
    <span class="dot-4">●</span>
    <span class="dot-5">●</span>
    <span class="dot-6">●</span>
</div>


<div class="w-100 border-top border-bottom" id="SendMsgDiv">
    <input type="hidden" name="to_id" id="to_id" value="{{ $getData->id }}">
    <input type="hidden" name="photo" id="photo" value="{{ auth()->user()->photo }}">
    <textarea autofocus="" data-emojiable="true" data-emoji-input="unicode" rows="1" autocomplete="off" id="body" name="body" class="form-control border-0 p-3 shadow-none" placeholder="Type your message..." style="resize:none">
</textarea>

<output tabindex="1" id="Filelist"></output>
    <!-- <textarea id="body" placeholder/="Write a message…" name="body" class="form-control border-0 p-3 shadow-none" rows="1"></textarea> -->
</div>
<div class="p-3 d-flex align-items-center">
    <div class="overflow-hidden">
        

        <label style="margin-top: 7px;" data-toggle="tooltip" data-placement="top" data-original-title="Click Picture" class="btn btn-light btn-sm rounded" for="fileAttachmentBtn">
            <i class="feather-paperclip"></i>
            <input id="fileAttachmentBtn"  name="files[]"  type="file" class="d-none">
        </label>

        
    </div>
    <span class="ml-auto">
        <button type="button" class="btn btn-primary btn-sm rounded send_message" id="send-message">
            <i class="feather-send"></i> Send
        </button>
    </span>
</div>
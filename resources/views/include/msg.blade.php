<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<style>
    #mbsmessage .msg-content {
        min-width: 200px;
        line-height: 9px;
        /* max-width: 250px; */
        font-size: 13px;
        text-align: center;
        font-weight: bold;
    }

    #mbsmessage .msg-content i {
        border: 2px solid #fff;
        height: 20px;
        border-radius: 50%;
        width: 20px;
        padding: 1px;
    }

    #mbsmessage,
    .system_message {
        position: fixed;
        left: 50%;
        transform: translate(-50%, 0);
        -webkit-transform: translate(-50%, 0);
        -ms-transform: translate(-50%, 0);
        bottom: 25px;
        width: auto;
        margin: 0;
        box-shadow: 0 0 10px 5px rgb(0 0 0 / 7%);
        z-index: 1041;
    }
    #mbsmessagesucesss .msg-content {
        min-width: 200px;
        line-height: 9px;
        /* max-width: 250px; */
        font-size: 13px;
        text-align: center;
        font-weight: bold;
    }

    #mbsmessagesucesss .msg-content i {
        border: 2px solid #fff;
        height: 20px;
        border-radius: 50%;
        width: 20px;
        padding: 1px;
    }

    #mbsmessagesucesss,
    .system_message {
        position: fixed;
        left: 50%;
        transform: translate(-50%, 0);
        -webkit-transform: translate(-50%, 0);
        -ms-transform: translate(-50%, 0);
        bottom: 25px;
        width: auto;
        margin: 0;
        box-shadow: 0 0 10px 5px rgb(0 0 0 / 7%);
        z-index: 1041;
    }


    #mbsmessageerror .msg-content {
        min-width: 200px;
        line-height: 9px;
        /* max-width: 250px; */
        font-size: 13px;
        text-align: center;
        font-weight: bold;
    }

    #mbsmessageerror .msg-content i {
        border: 2px solid #fff;
        height: 20px;
        border-radius: 50%;
        width: 20px;
        padding: 1px;
    }

    #mbsmessageerror,
    .system_message {
        position: fixed;
        left: 50%;
        transform: translate(-50%, 0);
        -webkit-transform: translate(-50%, 0);
        -ms-transform: translate(-50%, 0);
        bottom: 25px;
        width: auto;
        margin: 0;
        box-shadow: 0 0 10px 5px rgb(0 0 0 / 7%);
        z-index: 1041;
    }

    .alert--success {
        background: url(../images/icon--success.svg) no-repeat 15px 16px green;
        background-size: 30px;
    }

    .alert--alert {
        background: url(../images/icon--success.svg) no-repeat 15px 16px rgba(255, 0, 0, 0.6);
        background-size: 30px;
    }

    .alert {
        font-size: 1em;
        color: #fff;
        width: 100%;
        position: relative;
        padding: 10px 40px 10px 44px !important;
        margin-bottom: 18px;
        border: 1px solid transparent;
    }

    .alert {
        font-size: 0.812rem;
    }

    .alert {
        position: relative;
        padding: 1rem 1rem;
        margin-bottom: 1rem;
        border: 1px solid transparent;
        border-radius: 0.25rem;
    }
</style>

@if(session()->has('success'))
<div id="mbsmessage" class="alert alert--success" style="display: block">
    <div>
        <div class="msg-content"><i class="fa fa-check"></i> &nbsp;{{ session()->get('success') }}</div>
        <!--<a href="javascript:;" class="close" data-widget="remove"></a>-->
    </div>
</div>
@endif

@if(session()->has('error'))
<div id="mbsmessage" class="alert alert--alert" style="display: block">
    <div>
        <div class="msg-content"><i class="fa fa-times"></i> &nbsp; {{ session()->get('error') }}</div>
    </div>
</div>
@endif
@if (@$errors)
@error('email')
<div id="mbsmessage" class="alert alert--alert" style="display: block">
    <div>
        <div class="msg-content"><i class="fa fa-times"></i> &nbsp;{{ $message }}</div>
    </div>
</div>
@enderror

@error('password')
<div id="mbsmessage" class="alert alert--alert" style="display: block">
    <div>
        <div class="msg-content"><i class="fa fa-times"></i> &nbsp;{{ $message }}</div>
    </div>
</div>
@enderror
@error('name')
<div id="mbsmessage" class="alert alert--alert" style="display: block">
    <div>
        <div class="msg-content"><i class="fa fa-times"></i> &nbsp;{{ $message }}</div>
    </div>
</div>
@enderror
@endif

<div id="mbsmessagesucesss" class="alert alert--success" style="display: none">
    <div>
        <div class="msg-content"><i class="fa fa-check"></i> &nbsp;<span id="success"></span></div>

    </div>
</div>

<div id="mbsmessageerror" class="alert alert--alert" style="display: none">
    <div>
        <div class="msg-content"><i class="fa fa-times"></i> &nbsp; <span id="error"></span></div>
    </div>
</div>

<script>
    $("document").ready(function() {
        setTimeout(function() {
            $("#mbsmessage").remove();
        }, 3000);

    });
</script>
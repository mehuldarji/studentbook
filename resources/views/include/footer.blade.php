<script src="{{ asset('vendor/jquery/jquery.min.js') }}" type="48632658e8f27a523ee43f01-text/javascript"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}" type="48632658e8f27a523ee43f01-text/javascript"></script>

<script type="48632658e8f27a523ee43f01-text/javascript" src="{{ asset('vendor/slick/slick.min.js') }}"></script>

<script src="{{ asset('js/osahan.js') }}" type="48632658e8f27a523ee43f01-text/javascript"></script>
<script src="{{ asset('js/rocket-loader.min.js') }}" data-cf-settings="48632658e8f27a523ee43f01-|49" defer=""></script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/vaafb692b2aea4879b33c060e79fe94621666317369993" integrity="sha512-0ahDYl866UMhKuYcW078ScMalXqtFJggm7TmlUtp0UlD4eQk0Ixfnm5ykXKvGJNFjLMoortdseTfsRT8oCfgGA==" data-cf-beacon='{"rayId":"76af6bd18c369ba0","version":"2022.11.0","r":1,"token":"dd471ab1978346bbb991feaa79e6ce5c","si":100}' crossorigin="anonymous"></script>

<script type="text/javascript">
    $("document").ready(function() {
        $(".loader").fadeOut("slow");

    });

    //    $(window).load(function() {
    //         console('sada');
    //         $(".loader").fadeOut("slow");
    //     });



    // -------------------Common ajax function------------------


    function getDataByAjax(url, peram, method, msg) {
        
        $.ajax({
            url: url,
            type: method,
            data: peram,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function() {
                $('.loader').show();
            },
            success: function(resp) {

                if (resp.success == 'done') {
                    showMsg(msg);
                  
                } else if (resp.success == 'diff') {
                    showError(resp.msg);
                } else {
                    showError('Data processing error, Please try sometime.');
                }
                $('.loader').hide();
            }
        })
    }

    function getDataByAjaxImage(url, peram, method, msg) {
        console.log(url);
        console.log(peram);
        console.log(msg);
        $.ajax({
            url: url,
            type: method,
            data: peram,
            contentType: false,
            processData: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function() {
                $('.loader').show();
            },
            success: function(resp) {

                if (resp.success == 'done') {
                    showMsg(msg);
                    

                } else {
                    showError('Data processing error, Please try sometime.');
                }
                $('.loader').hide();
            }
        })
    }

    function checkValidation(key) {

        var input = $('#' + key).val();
        if (input == '') {
            $('#' + key).addClass('is-invalid');
            return false;
        } else {
            $('#' + key).removeClass('is-invalid');
            return true;
        }

    }

    function showError(msg) {
        $('#error').html(msg);
        $('#mbsmessageerror').show();


        setTimeout(function() {
            $("#mbsmessageerror").hide();
        }, 4000);


    }

    function showMsg(msg) {

        $('#success').html(msg);
        $('#mbsmessagesucesss').show();

        setTimeout(function() {
            $("#mbsmessagesucesss").hide();
        }, 4000);

    }







    // ------------------------------------------------------
</script>
</body>


</html>
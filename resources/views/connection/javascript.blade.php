<script>
    $(document).ready(function() {
        var limit = "{{ config('constant.CONNECTION_URL_LIMIT'); }}";
        var limit = parseInt(limit);
        var start = 0;
        var action = 'inactive';
        $(document).on('click', '#home-tab', function() {
            $('#load_data').html('');
            limit = "{{ config('constant.CONNECTION_URL_LIMIT'); }}";
            limit = parseInt(limit);
            start = 0;
            action = 'inactive';
            load_country_data(limit, start);
        });



        function load_country_data(limit, start) {
            
            var url = '{{ route("connection.user") }}';
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
            load_country_data(limit, start);
        }
        console.log(action);
        $(window).scroll(function() {
            if ($(window).scrollTop() + $(window).height() > $("#load_data").height() && action == 'inactive') {
                action = 'active';
                start = start + limit;
                setTimeout(function() {
                    $('#load_data_message').html("<p style='text-align: center; font-weight: bold;font-size: 18px;'><i class='fa fa-spinner fa-spin ' ></i>&nbsp;&nbsp;Please Wait....</p>");
                    $("#Serach").val('');
                    load_country_data(limit, start);
                }, 1000);

            }
        });

    });
    $(document).ready(function() {
        var limit1 = "{{ config('constant.CONNECTION_URL_LIMIT'); }}";
        var limit1 = parseInt(limit1);
        var start1 = 0;
        var action1 = 'inactive';
        // 
        $(document).on('click', '#profile-tab', function() {

            limit1 = "{{ config('constant.CONNECTION_URL_LIMIT'); }}";
            limit1 = parseInt(limit1);
            start1 = 0;
            action1 = 'inactive';
            $('#connection_data').html('');


            load_connection_data(limit1, start1);
        });



        function load_connection_data(limit1, start1) {
           
            var url = '{{ route("connection.my-contacts") }}';
            var peram = {
                limit: limit1,
                start: start1,
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
                    $('#connection_data').append(resp.html);
                    if (resp.success != 'done') {
                        $('#connection_data_message').html('');
                        action1 = 'active';
                    } else {
                        $('#connection_data_message').html("<p style='text-align: center; font-weight: bold;font-size: 18px;'><i class='fa fa-spinner fa-spin ' ></i>&nbsp;&nbsp;Please Wait....</p>");
                        action1 = 'inactive';
                    }

                }
            })



        }

        if (action1 == 'inactive') {
            action1 = 'active';
            load_connection_data(limit1, start1);
        }

        $(window).scroll(function() {
            if ($(window).scrollTop() + $(window).height() > $("#connection_data").height() && action1 == 'inactive') {
                action1 = 'active';

                start1 = start1 + limit1;


                setTimeout(function() {
                    $('#connection_data_message').html("<p style='text-align: center; font-weight: bold;font-size: 18px;'><i class='fa fa-spinner fa-spin ' ></i>&nbsp;&nbsp;Please Wait....</p>");

                    load_connection_data(limit1, start1);
                }, 1000);

            }
        });

    });

    


    $(document).on('click', '.accept', function() {
        var connection_id = $(this).attr('data-id');
        var status = $(this).attr('data-status');

        var url = '{{ route("connection.changeStatus") }}';

        var peram = {
            connection_id: connection_id,
            status: status
        };

        if (status == '1') {
            var msg = 'Accepted successfully.'
        } else {
            var msg = 'Decline successfully.'
        }

        getDataByAjax(url, peram, 'POST', msg);
        $(this).parents('.col-md-4').remove();
    });
    $(document).on('click', '.unfollow', function() {
        var connection_id = $(this).attr('data-id');
        var msg = $(this).attr('data-msg');
        var url = '{{ route("connection.unfollow") }}';

        var peram = {
            connection_id: connection_id,
        };

        getDataByAjax(url, peram, 'POST', msg);
        $(this).parents('.col-md-4').remove();
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
    $("#Serach").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        console.log(value);
        $("#load_data .col-md-4").filter(function() {
            $('#load_data_message').html('');
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
</script>
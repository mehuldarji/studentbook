<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">
    <title>{{ config('constant.PROJECT_NAME'); }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/slick/slick.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/slick/slick-theme.min.css')}}" />

    <link href="{{ asset('vendor/icons/feather.css')}}" rel="stylesheet" type="text/css">

    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <link href="{{ asset('css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('css/inline.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600%2C400%2C500%7CRoboto:400" rel="stylesheet" property="stylesheet" media="all">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        body {
            background-color: #fff;
            font-family: "Poppins", Arial, Helvetica, sans-serif;
        }

        .bg-theme {
            background-color: #F3F2EF !important;
        }

        .loginDe {
            box-shadow: 0 0px 25px rgb(0 0 0 / 7%);
            border-radius: 15px;
            padding: 30px;
        }

        @media (max-width:768px) {
            .loginDe {

                padding: 5px;
            }
        }
    </style>
</head>

<body>


    <main>
        <div class="loader"></div>
        <div class="blur-bg"></div>
        @include('include.msg')
        @yield('content')
    </main>
    <script src="{{ asset('vendor/jquery/jquery.min.js')}}" type="28ed724a0bfe3d065bf5b69f-text/javascript"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}" type="28ed724a0bfe3d065bf5b69f-text/javascript"></script>

    <script type="28ed724a0bfe3d065bf5b69f-text/javascript" src="{{ asset('vendor/slick/slick.min.js')}}"></script>

    <script src="{{ asset('js/osahan.js')}}" type="28ed724a0bfe3d065bf5b69f-text/javascript"></script>
    <script src="{{ asset('js/rocket-loader.min.js')}}" data-cf-settings="28ed724a0bfe3d065bf5b69f-|49" defer=""></script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vaafb692b2aea4879b33c060e79fe94621666317369993" integrity="sha512-0ahDYl866UMhKuYcW078ScMalXqtFJggm7TmlUtp0UlD4eQk0Ixfnm5ykXKvGJNFjLMoortdseTfsRT8oCfgGA==" data-cf-beacon='{"rayId":"76af6c0bfbbd6907","version":"2022.11.0","r":1,"token":"dd471ab1978346bbb991feaa79e6ce5c","si":100}' crossorigin="anonymous"></script>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
    $("document").ready(function() {
        $(".loader").fadeOut("slow");

    });

    function clickSubmit() {
        $('.loader').show();
    }
</script>

</html>
</body>

</html>
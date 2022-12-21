  <?php
        $value = \App\Models\Websitetable::where(['type' => 'brand_logo'])->first()->logo;
    ?>

<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="author" content="Spruko Technologies Private Limited">
		<meta name="keywords" content=" admin, admin template, html template, html5 template, bootstrap admin template, css templates, bootstrap 4 admin template, simple html templates, admin panel template, bootstrap dashboard template, admin dashboard template, simple bootstrap template, responsive html template, template admin bootstrap 4, html admin template, html dashboard template"/>
		<meta name="msapplication-TileColor" content="#0670f0">
		<meta name="theme-color" content="#b356d8">
		<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="mobile-web-app-capable" content="yes">
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<link rel="icon" href="{{ asset('/assets_admin/upload/')}}/{{$value}}" type="image/x-icon"/>
		<link rel="shortcut icon" type="image/x-icon" href="{{ asset('/assets_admin/upload/')}}/{{$value}}" />


		<!--Bootstrap.min css-->
                <link rel="stylesheet" href="{{ asset('assets_admin/plugins/bootstrap/css/bootstrap.min.css') }}" />

		<!-- Dashboard Css -->
                <link href="{{ asset('assets_admin/css/dashboard.css') }}" rel="stylesheet" />
                 <!--<link href="{{ asset('assets_admin/css/boxed.css') }}" rel="stylesheet" />-->

		<!-- Dark Css -->
                <link href="{{ asset('assets_admin/css/dark.css') }}" rel="stylesheet" />

		<!-- Color Css -->
                <link id="color" href="{{ asset('assets_admin/css/colors/color1.css') }}" rel="stylesheet" />

		<!-- Custom scroll bar css-->
                <link href="{{ asset('assets_admin/plugins/scroll-bar/jquery.mCustomScrollbar.css') }}" rel="stylesheet" />

		<!-- Sidemenu Css -->
                <link id="switcher" href="{{ asset('assets_admin/plugins/side-menu/css/sidemenu-icon.css') }}" rel="stylesheet" />

		<!-- Data table css -->
                 <link href="{{ asset('assets_admin/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
                 <link rel="stylesheet" href="{{ asset('assets_admin/plugins/Datatable/css/buttons.bootstrap4.min.css') }}" />
                 <link rel="stylesheet" href="{{ asset('assets_admin/plugins/datatable/responsive.bootstrap4.min.css') }}" />

		<!-- Slect2 css -->
                <link href="{{ asset('assets_admin/plugins/select2/select2.min.css') }}" rel="stylesheet" />

		<!---Font icons-->
                <link href="{{ asset('assets_admin/css/icons.css') }}" rel="stylesheet" />

		<!-- Sidebar css -->
                  <link href="{{ asset('assets_admin/plugins/sidebar/sidebar.css') }}" rel="stylesheet" />

		<!--Nice Select Css -->
                <link href="{{ asset('assets_admin/plugins/nice-select/css/nice-select.css') }}" rel="stylesheet" />
                
                <script src="//code.jquery.com/jquery-1.12.3.js"></script>
                
                <!-- WYSIWYG Editor css -->
                <link href="{{ asset('assets_admin/plugins/wysiwyag/richtext.min.css') }}" rel="stylesheet" />
                <link href="{{ asset('assets_admin/css/icons.css') }}" rel="stylesheet" />
                <link href="{{ asset('assets_admin/plugins/sidebar/sidebar.css') }}" rel="stylesheet" />
                
                <!-- file Uploads -->
                <link href="{{ asset('assets_admin/plugins/fileuploads/css/dropify.css') }}" rel="stylesheet"  type="text/css"/>

		<!-- File Uploads css -->
                <link href="{{ asset('assets_admin/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet"/>

                <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
                
                <!--validation-->
                <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"></script>


</head>
        
<style>
    
    .error{
        color: #FF0000
    }
            
    .dataTables_wrapper{
        width: 100%;
        /*overflow: hidden;*/
    }
    
    .btn-primary {
    background: -moz-linear-gradient(194deg,#00c9e4 0%,#007bff 100%);
    background: -webkit-gradient(linear,left top,right top,color-stop(0%,#007bff),color-stop(100%,#00c9e4));
    background: -webkit-linear-gradient(194deg,#00c9e4 0%,#007bff 100%);
    background: -o-linear-gradient(194deg,#00c9e4 0%,#007bff 100%);
    background: -ms-linear-gradient(194deg,#00c9e4 0%,#007bff 100%);
    background: linear-gradient(256deg,#0172bd8a 0%,#0172BD 100%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#007bff',endColorstr='#00c9e4',GradientType=1 );
    border-color:var(--theme-color);
}
            
</style>

@include('include/msg')
        
<body class="app sidebar-mini rtl">

    <div id="global-loader" style="padding:400px">
      <div class="lds-spinner"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
    </div>

        
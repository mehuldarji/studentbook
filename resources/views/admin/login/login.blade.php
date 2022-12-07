<!doctype html>
<html lang="en" dir="ltr">
  <head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="author" content="Spruko Technologies Private Limited">
		<meta name="keywords" content=" admin, admin template, html template, html5 template, bootstrap admin template, css templates, bootstrap 4 admin template, simple html templates, admin panel template, bootstrap dashboard template, admin dashboard template, simple bootstrap template, responsive html template, template admin bootstrap 4, html admin template, html dashboard template"/>
		<meta name="msapplication-TileColor" content="#8966f7">
		<meta name="theme-color" content="#b356d8">
		<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="mobile-web-app-capable" content="yes">
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<link rel="icon" href="{{ asset('/assets_admin/images/brand/logo.png')}}" type="image/x-icon"/>
		<link rel="shortcut icon" type="image/x-icon" href="{{ asset('/assets_admin/images/brand/logo.png')}}" />


		<link rel="stylesheet" href="../assets/plugins/bootstrap/css/bootstrap.min.css">

		<link href="../assets_admin/plugins/scroll-bar/jquery.mCustomScrollbar.css" rel="stylesheet" />

		<link href="../assets_admin/css/dashboard.css" rel="stylesheet" />
		<link href="../assets_admin/css/boxed.css" rel="stylesheet" />

		<link href="../assets_admin/css/dark.css" rel="stylesheet" />

		<link id="color" href="../assets_admin/css/colors/color1.css" rel="stylesheet" />

		<link href="../assets_admin/css/icons.css" rel="stylesheet" />

	</head>
	<body class="login-img custom-bg">

		<div class="page">
			<div class="custompage">
				<div class="custom-content  mt-0">
					<div class="row">
						<div class="col d-block mx-auto">
							<div class="row">
								<div class="col-md-12">
                                                                        <?php
                                                                            $value = \App\Models\Websitetable::where(['id' => 1])->first()->logo;
                                                                        ?>
									<img src="{{ asset('/assets_admin/upload/')}}/{{$value}}" class="mb-4 mt-2 mt-lg-0 h-8" alt="logo">
									<h4 class="text-center text-dark fs-20 font-weight-semibold mb-1">Login to your Account</h4>
									<p>Please Enter the Email address registered on your account</p>
                                                                        <form action="{{ route('admin.loginstore') }}" method="POST">
                                                                              @csrf
									<div class="form-group">
										<label class="form-label text-left" for="exampleInputEmail1">Email address</label>
                                                                                <input type="email" name="email" class="form-control" id="exampleInputEmail1"  placeholder="Enter email" required>
									</div>
									<div class="form-group">
										<label for="inputPassword3" class="text-left form-label">Password</label>
                                                                                <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password" required>
									</div>
								
									<div class="text-left">
										<button type="submit" class="btn btn-primary">Login</button>
                                                                                <a href="#">
                                                                                    <button type="submit" class="btn btn-danger">Cancel</button></a>
									</div>
                                                                    </form>
                                                                        <br><br>
                                                                        @if(session('failed'))
                                                                            <p class="alert alert-danger alert" style="text-align:center">{{ session()->get('failed') }}</p>
                                                                        @endif
<!--									<div class="text-left text-muted mt-3">
										Don't have account yet? <a href="register.html">Sign up</a>
									</div>-->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<script src="../assets_admin/js/jquery-3.2.1.min.js"></script>

		<script src="../assets_admin/js/jquery.sparkline.min.js"></script>

		<script src="../assets_admin/js/selectize.min.js"></script>

		<script src="../assets_admin/js/jquery.tablesorter.min.js"></script>

		<script src="../assets_admin/js/circle-progress.min.js"></script>

		<script src="../assets_admin/plugins/rating/jquery.rating-stars.js"></script>

		<script src="../assets_admin/plugins/bootstrap/popper.min.js"></script>
		<script src="../assets_admin/plugins/bootstrap/js/bootstrap.min.js"></script>

		<script src="../assets_admin/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js"></script>

		<script src="../assets_admin/plugins/peitychart/jquery.peity.min.js"></script>

		<script src="../assets_admin/plugins/counters/counterup.min.js"></script>
		<script src="../assets_admin/plugins/counters/waypoints.min.js"></script>

	</body>
</html>

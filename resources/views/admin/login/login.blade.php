<!doctype html>
<html lang="en" dir="ltr">
    
  @include('admin/include/header')
  
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

		 @include('admin/include/footer')

	</body>
</html>

@extends('ext/layouts/master')


@section('content')	
	
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						
						<h2>Login to your account</h2>
						<form action="{{Route('user_log')}}" method="post" enctype="multipart/form-data">
							@csrf
							<input type="text" name="c_email" placeholder="Email or Username" />
							<input type="text" name="c_password" placeholder="Password" />
							<span>
								<input type="checkbox" class="checkbox"> 
								Keep me signed in
							</span>
							<button type="submit" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					@if ($errors->any())
						<div class="alert alert-danger">
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form action="{{route('customerCreate')}}" method="post" enctype="multipart/form-data">
							@csrf
							<input type="text" name="first_name" placeholder="Display Name"/>
							<input type="text" name="last_name"  placeholder="Last Name"/>
							<input type="text" name="username"  placeholder="User name"/>
							<input type="email" name="c_email"  placeholder="Email Address"/>
							<input type="password" name="c_password"  placeholder="Password"/>
							<input type="text" name="phone"  placeholder="Phone"/>
							<button type="submit"  class="btn btn-default" >Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	
@endsection
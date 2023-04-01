<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login Parkir.In</title>
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	<link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
	<link href="https://fonts.googleapis.com/css?family=Anton|Bangers|Monoton|PT+Sans|Righteous|Shadows+Into+Light|Shrikhand|Spirax" rel="stylesheet">
</head>
<body>
	<form action="{{ route('login') }}" method="post">
	<div class="container-fluid" style="background-image: url('/image/spencer-harrison-wallpaper-1-2560x1440.jpg');height:662px;">
		<div class="row">
			<div class="col-md-6 offset-md-3">
				<div class="card card-default" style="margin-top:20%;">
					<div class="card-header">
						<h3 class="text-center">Login <span class="fa fa-user"></span></h3>
					</div>
					<div class="card-body">
						<div class="col-md-12">
							<div class="form-group">
								<label for="">Username</label>
								<input type="text" name="username" value="" placeholder="" class="form-control{{ $errors->has('username') ? ' is-invalid' : ''  }}" required="">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="">Password</label>
								<input type="password" name="password" value="" placeholder="" class="form-control" required="">
							</div>
						</div>	
					</div>
					<div class="card-footer">
						{{  csrf_field()	}}						
						<button type="submit" class="btn btn-outline-dark btn-block">Login</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>

<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
<script src="{{  asset('js/jquery.dataTables.min.js')}}"></script>	
<script src="{{  asset('js/dataTables.bootstrap4.min.js')}}"></script>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>خيركم</title>
	<!-- Stylesheets -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="{{theme_assets("css/animate.min.css")}}">
	<link href="{{theme_assets("css/fontawesome-all.css")}}" rel="stylesheet">
	<link href="{{theme_assets("css/material-design-iconic-font.css")}}" rel="stylesheet">
	<link href="{{theme_assets("css/owl.carousel.min.cs")}}s" rel="stylesheet">
	<link href="{{theme_assets("css/owl.theme.default.min.css")}}" rel="stylesheet">
	<link href="{{theme_assets("css/style.css")}}" rel="stylesheet">
	<!-- Responsive -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<link href="{{theme_assets("css/responsive.css")}}" rel="stylesheet">
	<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
	<script src="{{theme_assets("js/jquery-1.12.2.min.js")}}"></script>
	<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
	<div class="main-wrapper">
		<div class="pages_register">
			<div class="header_lang">
				<div class="container clearfix">
					<div class="lang_site_r">
						<a href="#">English</a>
					</div>
				</div>
			</div>
			<div class="page_register_content">
				<div class="container">
					<div class="row justify-content-md-center">
						<div class="col-lg-5 col-md-7">
							<div class="logo_site_center">
								<a href="#"><img src="{{theme_assets("images/logo.png")}}" alt="" class="img-responsive"></a>
							</div>
							<h2 class="title_reg">تسجيل الدخول</h2>
							<form class="form_st1" method="POST" action="{{route('login')}}">
									@csrf
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label>البريد الالكتروني أو الجوال</label>
											<input type="email" name='login' class="form-control" placeholder="البريد الالكتروني أو الجوال">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label>كلمة المرور</label>
											<div class="input_password">
												<input type="password" name="password" id="pwd" class="form-control" placeholder="كلمة المرور">
												<span class="show_pass" onclick="show()" id="EYE"><i class="fal fa-eye"></i></span>
											</div>
										</div>
										<div class="forget_pass clearfix">
											<a href="#">هل نسيت كلمة المرور؟</a>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<button type="submit" class="btn btn-block btn_orange">تسجيل الدخول</button>
									</div>
								</div>
							</form>
							<div class="reg_bottom">
								<h3>لا تمتلك حساب ؟ <a href="{{route('register')}}">يمكن التسجيل هنا</a></h3>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div><!--main-wrapper--> 
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="{{theme_assets("js/owl.carousel.min.js")}}" type="text/javascript"></script>
	<script src="{{theme_assets("js/script.js")}}"></script>
	<script type="text/javascript">
		function show() {
			var a=document.getElementById("pwd");
			var b=document.getElementById("EYE");
			if (a.type=="password")  {
			a.type="text";
			}
			else {
			a.type="password";
			}
		}
	</script>
</body>
</html>	
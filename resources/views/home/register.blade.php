\<!DOCTYPE html>
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
							<h2 class="title_reg">تسجيل مستخدم جديد</h2>
							<form class="form_st1" method="POST" action="{{route('register')}}">
								@csrf
								@if($errors->count())
								<div class="clearfix">
										<div class="alert alert-danger" role="alert">
	
											<ul>
												@foreach ($errors->all() as $error)
													<li>{{ $error }}</li>
												@endforeach
											</ul>
									</div>
								</div>
								@endif
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>الاسم الاول</label>
											<input type="text" name="firstName" class="form-control" placeholder="الاسم الاول">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>الاسم الاخير</label>
											<input type="text" name="lastName" class="form-control" placeholder="الاسم الاخير">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label>رقم الموبايل</label>
											<div class="input_number">
												<input type="text" class="form-control number_input" name="mobileNumber">
												<select class="form-control select_flag" name="mobileCountry">													
                                                    <option><img src="{{theme_assets("images/flag.png")}}" alt="">966+</option>
                                                    <option><img src="{{theme_assets("images/flag.png")}}" alt="">966+</option>
                                                    <option><img src="{{theme_assets("images/flag.png")}}" alt="">966+</option>
                                                    <option><img src="{{theme_assets("images/flag.png")}}" alt="">966+</option>

												</select>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label>البريد الالكتروني</label>
											<input type="email" class="form-control" name="email" placeholder="البريد الالكتروني">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label>كلمة المرور</label>
											<input type="password" name="password" class="form-control" placeholder="كلمة المرور">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<button type="submit" class="btn btn-block btn_orange">إنشاء حساب</button>
									</div>
								</div>
							</form>
							<div class="reg_bottom">
								<p>من خلال التسجيل ، فإنك توافق على <a href="#">شروط الاستخدام</a> و <a href="#">سياسة الخصوصية </a> و <a href="#">سياسة ملفات تعريف الارتباط.</a></p>
								<h3>هل تمتلك حساب ؟ <a href="{{route('login')}}">يمكن التسجيل الدخول هنا</a></h3>
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
</body>
</html>	
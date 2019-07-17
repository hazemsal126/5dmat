@extends('app')

@section('title', 'العنوانين')

@section('content')
<div class="skin_page">
	<div class="breadcrumb_content">
		<div class="container">
			<nav aria-label="breadcrumb">
			  <ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">الرئيسية</a></li>
				<li class="breadcrumb-item active" aria-current="page">العناوين</li>
			  </ol>
			</nav>
		</div>
	</div>
	<div class="content_skin_page">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-4">
					<div class="profile_side">
						<h2 class="profile_title">أهلا بك {{Auth::user()->name}} !</h2>
						<ul class="profile_side_menu clearfix">
							<li class="{!! Request::is(Config::get('app.locale_prefix').'/UserAccount/Orders*') ? 'active' : '' !!}">
								<a href="{{route('Orders.index')}}"><span><img src="{{theme_assets("images/choices.svg")}}" alt=""></span>طلباتي</a>
							</li>
							<li class="{!! Request::is(Config::get('app.locale_prefix').'/UserAccount/Addresses*') ? 'active' : '' !!}">
								<a href="{{route('Addresses.index')}}"><span><img src="{{theme_assets("images/address-icon.svg")}}" alt=""></span>العناوين</a>
							</li>
							<li class="{!! Request::is(Config::get('app.locale_prefix').'/UserAccount/Points*') ? 'active' : '' !!}">
								<a href="{{route('Points.index')}}"><span><img src="{{theme_assets("images/point-icon.svg")}}" alt=""></span>نقاطي</a>
							</li>
							<li class="{!! Request::is(Config::get('app.locale_prefix').'/UserAccount/Students*') ? 'active' : '' !!}">
								<a href="{{route('Students.index')}}"><span><img src="{{theme_assets("images/followers.svg")}}" alt=""></span>ملفات متابعة الطلاب</a>
							</li>
							<li class="{!! Request::is(Config::get('app.locale_prefix').'/UserAccount/Ratings*') ? 'active' : '' !!}">
								<a href="{{route('Ratings.index')}}"><span><img src="{{theme_assets("images/rating.svg")}}" alt=""></span>التقييمات</a>
							</li>
							<li class="{!! Request::is(Config::get('app.locale_prefix').'/UserAccount/Profile*') ? 'active' : '' !!}">
								<a href="{{route('Profile.index')}}"><span><img src="{{theme_assets("images/profile.svg")}}" alt=""></span>الملف الشخصي</a>
							</li>
							<li>
								<a href="{{route('Profile.logout')}}"><span><img src="{{theme_assets("images/logout.svg")}}" alt=""></span>تسجيل الخروج</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-9 col-md-8">
					@yield('account-content')
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
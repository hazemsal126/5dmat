<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>@yield('title')</title>
	<!-- Stylesheets -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="{{theme_assets("css/animate.min.css")}}">
	<link href="{{theme_assets("css/fontawesome-all.css")}}" rel="stylesheet">
	<link href="{{theme_assets("css/material-design-iconic-font.css")}}" rel="stylesheet">
	<link href="{{theme_assets("css/owl.carousel.min.css")}}" rel="stylesheet">
	<link href="{{theme_assets("css/owl.theme.default.min.css")}}" rel="stylesheet">
	@yield('styles')
    <link href="{{theme_assets("css/style.css")}}" rel="stylesheet">
	<link href="{{theme_assets("css/chat.css")}}" rel="stylesheet">

	<!-- Responsive -->
	@if (empty(config('app.locale_prefix')) ||config('app.locale_prefix') =='fr' )
		<link href="{{theme_assets("css/ltr.css")}}" rel="stylesheet">
	@endif
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<link href="{{theme_assets("css/responsive.css")}}" rel="stylesheet">
	<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
	<script src="{{theme_assets("js/jquery-1.12.2.min.js")}}"></script>
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<link rel="apple-touch-icon" sizes="57x57" href="/fav/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="/fav/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/fav/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="/fav/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/fav/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="/fav/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="/fav/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="/fav/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="/fav/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="/fav/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/fav/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="/fav/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/fav/favicon-16x16.png">
	<link rel="manifest" href="/fav/manifest.json">

	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="/fav/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{url('/')}}/bundle.js" ></script>
</head>
<body>
    @php
    $chat_id=session('chat');
    if(!isset($chat_id)){
    $chat_id=session(['chat'=>rand(10000000,99999999)]);
    }
    @endphp

	<div id="search">
        <div class="overlay-close"></div>
        <div class="center-screen">
	        <form action="{{route('search')}}" class="form_search" method="get">
                @csrf
				<div class="form-group">
					<button type="submit" class="search_submit"><i class="fa fa-search" aria-hidden="true"></i></button>
					<input type="text" name="search" class="form-control" placeholder="ابحث هنا ...">
				</div>
			</form>
		</div>
    </div>
	<div class="mobile-menu">
	    <div class="menu-mobile">
	        <div class="brand-area">
	            <a href="#">
	            	<img src="{{theme_assets("images/logo.png")}} alt="" class="img-responsive">
	            </a>
	        </div>
	        <div class="mmenu">
		        <ul class="menu_xs">
			        <li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">جميع الخدمات</a>
						<ul class="dropdown-menu">
							<li><a href="#">الخدمات</a></li>
							<li><a href="#">الخدمات</a></li>
							<li><a href="#">الخدمات</a></li>
							<li><a href="#">الخدمات</a></li>
							<li><a href="#">الخدمات</a></li>
						</ul>
					</li>
					@foreach ($productCategory as $category)
						<li>
							<a href="{{route("product-filters")}}">
								{{$category->getTranslation('name', l())}}
							</a>
						</li>
					@endforeach
				</ul>
				<ul>
					<li>
						<a href="{{route("register")}}">اشتراك</a>
					</li>
					<li>
						<a href="{{route("login")}}">تسجيل دخول</a>
					</li>

				</ul>
				<ul>
					<li>
						<a href="{{url('/ar_SA')}}" class="btn_lang">ع</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="m-overlay"></div>
	</div><!--mobile-menu-->
	<div class="main-wrapper">
		<header id="header">
			<div class="head_top">
				<div class="container clearfix">
					<div class="logo_site">
						<a href="{{route('home')}}"><img src="{{theme_assets("images/logo_head.svg")}}" alt="" class="img-responsive"></a>
					</div>
					<div class="main_search_head">
						<form class="form_msearch" action="{{route('search')}}" method="post">
                            @csrf
							<input type="text" name="search" class="form-control" placeholder="ابحث عن المشروع المراد ...">
							<button type="submit" class="btn btn_search"><i class="far fa-search"></i></button>
						</form>
					</div>
					<div class="head_m_left clearfix">
						<div class="hm_item hidden_md">
                            <div class="dropdown">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="{{url('/')}}/front/images/world.png" style="width:30px;">
                                </a>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="min-width: 5rem; background-color: rgba(44,62,80,0.5);">
                                    <a class="dropdown-item" href="{{url('/ar_SA')}}"><img src="{{url('/')}}/front/images/flag1.png" style="width:30px;"></a>
                                    <a class="dropdown-item" href="{{url('/')}}"><img src="{{url('/')}}/front/images/flag2.png" style="width:30px;"></a>
                                    <a class="dropdown-item" href="{{url('/fr')}}"><img src="{{url('/')}}/front/images/flag4.png" style="width:30px;"></a>
                                </div>
                              </div>
                        </div>

						@if (! auth()->check())
							<div class="hm_item hidden_md">
								<ul class="hm_login clearfix">
									<li><a href="{{route("register")}}">اشتراك</a></li>
									<li><a href="{{route("login")}}">تسجيل دخول</a></li>
								</ul>
							</div>
						@else
						<div class="hm_item hidden_md">
							<div class="user_after_login dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{auth()->user()->name}}</a>
								<ul class="dropdown-menu ppp_dropdown" x-placement="bottom-start">
									<li><a href="{{route('Orders.index')}}"><span><img src="{{theme_assets("images/choices.svg")}}"></span>طلباتي</a></li>
									<li><a href="{{route('Addresses.index')}}"><span><img src="{{theme_assets("images/pin.svg")}}"></span>العناوين</a></li>
									<li><a href="{{route('Points.index')}}"><span><img src="{{theme_assets("images/favorites-button.svg")}}"></span>نقاطي</a></li>
									<li><a href="{{route('Students.index')}}"><span><img src="{{theme_assets("images/followers.svg")}}"></span>ملفات متابعة الطلاب</a></li>
									<li><a href="{{route('Ratings.index')}}"><span><img src="{{theme_assets("images/rating.svg")}}"></span>التقييمات</a></li>
									<li><a href="{{route('Profile.index')}}"><span><img src="{{theme_assets("images/profile.svg")}}"></span>الملف الشخصي</a></li>
									<li><a href="{{route('Profile.logout')}}"><span><img src="{{theme_assets("images/logout.svg")}}"></span>تسجيل الخروج</a></li>
								</ul>
							</div>
						</div>
						@endif
						<div class="hm_item">
							<ul class="action_hmd clearfix">
								<li class="zoom_xs">
									<a href="#search"><i class="far fa-search"></i></a>
								</li>
								<li>
									{{-- <a href="{{route('cart')}}" class="shopping-cart"><i class="far fa-shopping-cart"></i></a> --}}
									<a href="#" class="shopping-cart dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<i class="far fa-shopping-cart"></i>
										@if (count($cartItems) >0)
											<span class="cart_badge">{{count($cartItems)}}</span>
										@endif
									</a>
									@if (count($cartItems) >0)
									<div class="dropdown-menu cart_dropdown">
										@foreach ($cartItems as $item)
										<a href="{{route("cart")}}" class="cart_meee clearfix">
                                            <img src="{{u($item["attributes"]["product"]["product_image"])}}" alt="" class="img-responsive">
											<div class="cmme_txt">
												<h3>تم إضافة عنصر جديد إلى سلة التبرعات</h3>
												<p>{{$item["attributes"]["product"]["description"][
														l()
													]}} ( {{$item["price"]}} ر.س )</p>
											</div>
										</a>
										@endforeach
									</div>
									@endif

								</li>
								<li class="toggle_menu">
									<button type="button" class="hamburger is-closed">
								        <span class="hamb-top"></span>
								        <span class="hamb-middle"></span>
								        <span class="hamb-bottom"></span>
								    </button>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="head_bottom">
				<div class="container">
					<ul class="main_menu clearfix">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">جميع الخدمات</a>
							<ul class="dropdown-menu">
                                    <li><a href="{{route("about")}}">عن خيركم</a></li>
                                	@foreach ($productCategory as $category)
							<li>
								<a href="{{route("product-filters",[\Illuminate\Support\Str::slug($category->getTranslation('name','en')),$category->id])}}">
									{{$category->name}}
								</a>
							</li>
						@endforeach
                                <li><a href="{{route("wages")}}">الأجر المستديم</a></li>
								<li><a href="#">طرق التبرع</a></li>
								<li><a href="#">رعاية البرامج</a></li>

							</ul>
						</li>
						@foreach ($productCategory as $category)
							<li>
								<a href="{{route("product-filters",[\Illuminate\Support\Str::slug($category->getTranslation('name','en')),$category->id])}}">
									{{$category->name}}
									{{-- {{$category->getTranslation('name', l())}} --}}

								</a>
							</li>
						@endforeach
						{{-- <li><a href="#">المنتجات الورقية</a></li>
						<li><a href="#">منتجات الزكاة</a></li>
						<li><a href="#">منتجات الصدقة العامة</a></li>
						<li><a href="#">الاهداءات</a></li>
						<li><a href="#">الباقات المنوعة</a></li> --}}
					</ul>
				</div>
			</div>
		</header><!--header-->
        @yield('content')
		<footer id="footer">
			<div class="footer_support">
				<div class="container">
					<div class="row">
						<div class="col-xl-4 col-lg-5">
							<div class="f_support_txt">
								<h2>يتوفر فريق دعم فني على مدار الساعة</h2>
								<p>يمكنك التواصل معنا عبر بيانات التواصل التالية:</p>
							</div>
						</div>
						<div class="col-xl-6 col-lg-7 offset-xl-1">
							<div class="support_info">
								<div class="row">
									<div class="col-md-4">
										<div class="info_supp_item clearfix">
                                        <img src="{{theme_assets("images/mail.svg")}}" alt="" class="img-responsive">
											<div class="tt_info">
												<h3>البريد الالكتروني</h3>
												<h2>info@qjstore.com</h2>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="info_supp_item clearfix">
											<img src="{{theme_assets("images/phone.svg")}}" alt="" class="img-responsive">
											<div class="tt_info">
												<h3>هاتف رقم</h3>
												<h2>920016670</h2>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="info_supp_item clearfix">
											<img src="{{theme_assets("images/whatsapp.svg")}}" alt="" class="img-responsive">
											<div class="tt_info">
												<h3>WhatsApp</h3>
												<h2 dir="ltr">+966506523333</h2>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="middle_footer">
				<div class="container">
					<div class="row">
						<div class="col-xl-4 col-lg-5">
							<div class="f_about">
								<div class="f_logo">
									<a href="{{route('home')}}">
										<img src="{{theme_assets("images/logo.png")}}" alt="" class="img-responsive">
									</a>
								</div>
								<p>جمعية خيركم لتحفيظ القرآن الكريم – تصريح وزارة الشؤون اإلسالمية رقم 2/2</p>
								<ul class="f_social_icons clearfix">
									<li>
										<a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
									</li>
									<li>
										<a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
									</li>
									<li>
										<a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
									</li>
									<li>
										<a href="#" target="_blank"><i class="fab fa-youtube"></i></a>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-xl-6 col-lg-7 offset-xl-1">
							<div class="row">
								<div class="col-md-4">
									<div class="f_menu_block">
										<h3>الرئيسية</h3>
										<ul class="f_menu_list clearfix">
											@foreach ($productCategory as $category)
											<li>
												<a href="{{route("product-filters",[\Illuminate\Support\Str::slug($category->getTranslation('name','en')),$category->id])}}">
													{{$category->getTranslation('name', l())}}
												</a>
											</li>
											@endforeach
										</ul>
									</div>
								</div>
								<div class="col-md-4">
									<div class="f_menu_block">
										<h3>معلومات الحساب</h3>
										<ul class="f_menu_list clearfix">
											<li><a href="{{route('Orders.index')}}">طلباتي</a></li>
											<li><a href="{{route('Addresses.index')}}">العناوين</a></li>
											<li><a href="{{route('Points.index')}}">نقاطي</a></li>
											<li><a href="{{route('Students.index')}}">ملفات متابعة الطلاب</a></li>
											<li><a href="{{route('Ratings.index')}}">التقييمات</a></li>
											<li><a href="{{route('Profile.index')}}">الملف الشخصي</a></li>
										</ul>
									</div>
								</div>
								<div class="col-md-4">
									<div class="f_menu_block">
										<h3>سياسات الموقع</h3>
										<ul class="f_menu_list clearfix">
											<li><a href="{{route("privacy")}}">سياسة المستخدم</a></li>
											<li><a href="{{route("policy")}}">سياسة الخصوصية</a></li>
											<li><a href="{{route("faq")}}">أسئلة شائعة</a></li>
											<li><a href="{{route("about")}}">من نحن</a></li>
											<li><a href="{{route("contact")}}">تواصل معنا</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="bottom_footer">
				<div class="container clearfix">
					<div class="bf_left clearfix">
						<ul class="payment_method clearfix">
							<li><img src="{{theme_assets("images/visa-pay-logo.png")}}" alt="" class="img-responsive"></li>
							<li><img src="{{theme_assets("images/mastercard.png")}}" alt="" class="img-responsive"></li>
							<li><img src="{{theme_assets("images/1200px-Mada_Logo.png")}}" alt="" class="img-responsive"></li>
							<li><img src="{{theme_assets("images/bank-transfer-logo.png")}}" alt="" class="img-responsive"></li>
						</ul>
						<button class="btn_chat" onclick="openForm()">Chat<img src="{{theme_assets("images/chat.png")}}" alt="" class="img-responsive"></button>
					</div>
					<div class="bf_right">
						<p class="copyright">2018 ©جميع الحقوق محفوظة لمتجر خيركم </p>
					</div>
				</div>
            </div>
		</footer><!--footer-->

        <div class="chat-popup" id="myForm">


                <div class="panel-heading top-bar" onclick="closeForm()">
                        <div class="col-md-8 col-xs-8">
                            <h4 class="panel-title"><span class="glyphicon glyphicon-comment"></span> Chat</h4>
                        </div>
                    </div>
                    @php
                        $chats=\App\Chat::where([['session_id',$chat_id],['status',1]])->get();
                    @endphp
            <div class="msg_container_base">
                @foreach ($chats as $chat)
                    @if($chat->user_id == 1)
            <div class="container">
            <p>{{$chat->message}}</p>
            <span class="time-right">{{$chat->created_at->format('H:i:s')}}</span>
            </div>
            @else
            <div class="container darker">
            <p>{{$chat->message}}</p>
            <span class="time-left">{{$chat->created_at->format('H:i:s')}}</span>
            </div>
            @endif
            @endforeach


            </div>
                    <div class="panel-footer">
                            <div class="input-group">
                                <input id="btn-input" type="text" name="message" class="form-control input-sm chat_input" placeholder="Write your message here..." />
                                <span class="input-group-btn">
                                <button class="btn btn-primary btn-sm" id="btn-chat" pull-link="{{route('chatstore')}}">Send</button>
                                </span>
                            </div>
                        </div>

        </div>
	</div><!--main-wrapper-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/smoothscroll/1.4.4/SmoothScroll.min.js"></script>
	<script src="{{theme_assets("js/owl.carousel.min.js")}}" type="text/javascript"></script>
	<script src="{{theme_assets("js/waypoints.min.js")}}"></script>
	<script src="{{theme_assets("js/jquery.counterup.min.js")}}"></script>
    <script src="{{theme_assets("js/script.js")}}"></script>
    @yield('scripts')
	<script>
		jQuery(document).ready(function( $ ) {
		$('.counter').counterUp({
		delay: 10,
		time: 1000
		});
        });


        function openForm() {
            document.getElementById("myForm").style.display = "block";
          }

          function closeForm() {
            document.getElementById("myForm").style.display = "none";
          }


		$("#btn-input").keypress(function(e) {
			if(e.which == 13) {
				$("#btn-chat").click();
			}
		});

          $("#btn-chat").click(function(){
            var url = $(this).attr('pull-link');
            var message=$('#btn-input').val();

            $.post(url,{
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    message:message,
                } ,function () {
						$('#btn-input').val('');
					}
                );
        });



		Echo.channel('chat{{session('chat')}}')
				.listen('SendChatEvent', (e) => {
					if (e.user_id == 1) {
						$(".msg_container_base").append('<div class="container">\n' +
								'            <p>' + e.message + '</p>\n' +
								'            <span class="time-right">' + e.created_at + '</span>\n' +
								'            </div>');
					}
					else {
					$(".msg_container_base").append(' <div class="container darker">\n' +
							'            <p>' + e.message + '</p>\n' +
							'            <span class="time-left">' + e.created_at + '</span>\n' +
							'            </div>');
					}
				});
	</script>
</body>
</html>

@extends('app')

@section('title', 'العنوانين')

@section('content')
<div class="skin_page">
	<div class="breadcrumb_content">
		<div class="container">
			<nav aria-label="breadcrumb">
			  <ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">الرئيسية</a></li>
				<li class="breadcrumb-item active" aria-current="page">سياسة الخصوصية</li>
			  </ol>
			</nav>
		</div>
	</div>
	<div class="content_page_single">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<div class="ul_side_right">
						<ul>
							<li class="{!! Request::is('SiteInformation/Privacy') ? 'active' : '' !!}"><a href="{{route("privacy")}}">سياسة الخصوصية</a></li>
							<li class="{!! Request::is('SiteInformation/Policy') ? 'active' : '' !!}"><a href="{{route("policy")}}">سياسة الاستخدام</a></li>
							<li class="{!! Request::is('SiteInformation/FAQ') ? 'active' : '' !!}"><a href="{{route("faq")}}">اسئلة شائعة</a></li>
							<li class="{!! Request::is('SiteInformation/About') ? 'active' : '' !!}"><a href="{{route("about")}}">من نحن</a></li>
							<li class="{!! Request::is('SiteInformation/Contact') ? 'active' : '' !!}"><a href="{{route("contact")}}">تواصل معنا</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-9">
					@yield('siteinfo-content')
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
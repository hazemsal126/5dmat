@extends('app')

@section('title', "خطأ 404 : الصفحة غير موجودة !")

@section('content')
<div class="page_error">
  <div class="container">
    <div class="page_error_content">
    <img src="{{theme_assets("images/404.png")}}" alt="" class="img-responsive">
      <p>الصفحة التي تبحث عنها غير موجودة.</p>
    <a href="{{url('/')}}" class="error_link">الانتقال الى الصفحة الرئيسية</a>
    </div>
  </div>
</div>
@endsection
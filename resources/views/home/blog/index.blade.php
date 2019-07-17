@extends('app')

@section('title', 'الصفحة الرئيسية')

@section('content')
<div class="breadcrumb_content">
    <div class="container">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">الرئيسية</a></li>
          <li class="breadcrumb-item"><a href="{{route('blogs')}}">المدونة</a></li>
            {{-- <li class="breadcrumb-item active" aria-current="page">قسم رقم 1</li> --}}
          </ol>
        </nav>
    </div>
</div>
<div class="page_inner_content">
    <div class="container">
        <h2 class="page_inner_title">المدونة</h2>
        <div class="blog_list">
            <div class="row">
                @foreach ($articles as $item)
                    <div class="col-md-4 col-sm-6">
                        <div class="blog_item">
                            <div class="blog_thumb">
                                <a href="{{route('blog',$item->id)}}" class="img-hover"><img src="{{u($item->image)}}" alt="" class="img-responsive"></a>
                                <div class="blog_date">
                                <h3>{{d($item->date)}}</h3>
                                </div>
                            </div>
                            <div class="blog_txt">
                                <div class="blt_t clearfix">
                                <h2><a href="{{route('blog',$item->id)}}">{{$item->title}}</a></h2>
                                    {{-- <div class="item_view"><i class="fal fa-eye"></i> 315</div> --}}
                                </div>
                            {{-- <p>{{{{route('blog',$item->id)}}}}</p> --}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <ul class="pagination clearfix">
              <li class="page-item page_next"><a class="page-link" href="#"><i class="fal fa-long-arrow-left"></i></a></li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item active"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">4</a></li>
              <li class="page-item"><a class="page-link" href="#">5</a></li>
              <li class="page-item page_prev"><a class="page-link" href="#"><i class="fal fa-long-arrow-right"></i></a></li>
            </ul>
        </div>
    </div>
</div>
@endsection
@extends('app')

@section('title', 'الصفحة الرئيسية')

@section('content')
<div class="breadcrumb_content">
    <div class="container">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">الرئيسية</a></li>
            <li class="breadcrumb-item"><a href="{{route('blogs')}}">المدونة</a></li>
          </ol>
        </nav>
    </div>
</div>
<div class="page_inner_content">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="blog_post">
                    <div class="bpost_thumb">
                    <img src="{{theme_assets("images/gg.png")}}" alt="" class="img-responsive">
                    </div>
                    <div class="bpost_txt">
                    <div class="post_date">{{d($article->date)}}</div>
                        <h2>{{$article->title}}</h2>
                        <p>
                                {{$article->content}}
                        </p>
                    </div>
                </div>
                <div class="post_share">
                    <h2>مشاركة</h2>
                    <ul class="share_social clearfix">
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
                            <a href="#" target="_blank"><i class="fab fa-whatsapp"></i></a>
                        </li>
                        <li>
                            <a href="#" target="_blank"><i class="fal fa-mobile-alt"></i></a>
                        </li>
                        <li>
                            <a href="#" target="_blank"><i class="fal fa-share-alt"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="side_article">
                    <h2>مقالات ذات صلة</h2>
                    <div class="blog_list">
                        <div class="row">
                            @foreach ($related as $item)
                                <div class="col-md-12">
                                    <div class="blog_item">
                                        <div class="blog_thumb">
                                            <a href="{{route('blog',$item->id)}}" class="img-hover"><img src="{{u($item->image)}}" alt="" class="img-responsive"></a>
                                            <div class="blog_date">
                                                <div class="post_date">{{d($article->date)}}</div>
                                            </div>
                                        </div>
                                        <div class="blog_txt">
                                            <div class="blt_t clearfix">
                                                <h2><a href="{{route('blog',$item->id)}}">{{$item->title}}</a></h2>
                                                {{-- <div class="item_view"><i class="fal fa-eye"></i> 315</div> --}}
                                            </div>
                                            {{-- <p>حلقة تحفيظ القرأن الكريم تحتوى على 15 حافظ لكتاب الله, حلقة تحفيظ القرأن الكريم حلقة تحفيظ القرأن الكريم تحتوى على 15 حافظ لكتاب الله, حلقة تحفيظ القرأن الكريم  حلقة تحفيظ القرأن الكريم  </p> --}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
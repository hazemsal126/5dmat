@extends('account')

@section('title', 'العنوانين')

@section('account-content')
<div class="profile_left_content">
<h2 class="plc_title">{{$Product->name}}</h2>
    <div class="st_news_block">
        <h3>الأخبار</h3>
        <div class="row">
            <div class="col-md-7">
                <div class="stnews_block">
                    <a href="{{route('blog',[$Articles[0]->id])}}" class="stn_thumb img-hover">
                        <img src="{{theme_assets("images/sd.png")}}" alt="" class="img-responsive">
                    </a>
                    <div class="stn_txt">
                        <h2><a href="{{route('blog',[$Articles[0]->id])}}">{{$Articles[0]->title}} </a></h2>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="stn_small_newsList">
                    @for ($i = 1; $i < min(count($Articles),5); $i++)
                        <div class="stn_smItem clearfix">
                        <a href="{{route('blog',[$Articles[$i]->id])}}" class="stsm_thumb">
                                <img src="{{theme_assets("images/th1.png")}}" alt="" class="img-responsive">
                            </a>
                            <div class="stsm_txt">
                                <h2><a href="{{route('blog',[$Articles[$i]->id])}}">{{$Articles[$i]->title}}</a></h2>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
        <div class="st_news_bottom">
            <div class="row">
                <div class="col-md-6">
                    <div class="st_news_block">
                        <h3>معرض الصور</h3>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="stnews_block">
                                    <a data-fancybox="gallery" href="{{theme_assets("images/ssd.png")}}" class="stn_thumb img-hover">
                                        <img src="{{theme_assets("images/ssd.png")}}" alt="" class="img-responsive">
                                    </a>
                                    <div class="stn_txt">
                                        <h2><a href="#">حفل تكريم 20 طالب قاموا بختم عشرة أجزاء من القرأن الكريم </a></h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="stnews_block sst_xs">
                                    <a data-fancybox="gallery" href="{{theme_assets("images/sdsd.png")}}" class="stn_thumb img-hover">
                                        <img src="{{theme_assets("images/sdsd.png")}}" alt="" class="img-responsive">
                                    </a>
                                    <div class="stn_txt">
                                        <h2><a href="#">حفل تكريم 20 طالب قاموا بختم عشرة أجزاء</a></h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="stnews_block sst_xs">
                                    <a data-fancybox="gallery" href="{{theme_assets("images/sdsd.png")}}" class="stn_thumb img-hover">
                                        <img src="{{theme_assets("images/sdsd.png")}}" alt="" class="img-responsive">
                                    </a>
                                    <div class="stn_txt">
                                        <h2><a href="#">حفل تكريم 20 طالب قاموا بختم عشرة أجزاء</a></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="st_news_block">
                        <h3>معرض الفيديو</h3>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="stnews_block">
                                    <a data-fancybox="" href="https://www.youtube.com/watch?v=_sI_Ps7JSEk" class="stn_thumb img-hover">
                                        <img src="{{theme_assets("images/sw.png")}}" alt="" class="img-responsive">
                                        <span class="sn_play">
                                            <img src="{{theme_assets("images/play-button.svg")}}" alt="">
                                        </span>
                                    </a>
                                    <div class="stn_txt">
                                        <h2><a href="#">حفل تكريم 20 طالب قاموا بختم عشرة أجزاء من القرأن الكريم </a></h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="stnews_block sst_xs">
                                    <a data-fancybox="" href="https://www.youtube.com/watch?v=_sI_Ps7JSEk" class="stn_thumb img-hover">
                                        <img src="{{theme_assets("images/sdsd.png")}}" alt="" class="img-responsive">
                                        <span class="sn_play">
                                            <img src="{{theme_assets("images/play-button.svg")}}" alt="">
                                        </span>
                                    </a>
                                    <div class="stn_txt">
                                        <h2><a href="#">حفل تكريم 20 طالب قاموا بختم عشرة أجزاء</a></h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="stnews_block sst_xs">
                                    <a data-fancybox="" href="https://www.youtube.com/watch?v=_sI_Ps7JSEk" class="stn_thumb img-hover">
                                        <img src="{{theme_assets("images/sdsd.png")}}" alt="" class="img-responsive">
                                        <span class="sn_play">
                                            <img src="{{theme_assets("images/play-button.svg")}}" alt="">
                                        </span>
                                    </a>
                                    <div class="stn_txt">
                                        <h2><a href="#">حفل تكريم 20 طالب قاموا بختم عشرة أجزاء</a></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
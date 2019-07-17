@extends('app')

@section('title', 'الصفحة الرئيسية')

@section('content')
<section class="section_home">
    <div class="owl-carousel" id="home_slider">
        @foreach ($TopSlider->items as $item)

            <div class="item">
                <div class="slide_item" style="background-image: url({{u($item->image)}});">
                    <div class="container">
                        <div class="row justify-content-md-center">
                            <div class="col-md-10">
                                <div class="slide_caption">
                                    <h2>{{$item->name}} </h2>
                                    <a href="{{$item->url}}" target="_blank" class="donation_link">{{$item->action}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section><!--section_home-->
<section class="section_project_top section_bg">
    <div class="container">
        <div class="secPro_head clearfix">
            <h2>المشاريع الأكثر تبرعاً</h2>
            <a href="{{url('/Product/filter/all/all/mostDonation/all/10/2000/1,2,3,4,5/all/all/all')}}" class="h_more">عرض المزيد</a>
        </div>
        <div class="sec_warpper">
            <div class="ho_projects_list">
                <div class="row">
                    @foreach ($TopDonatedProducts as $product)
                    <div class="col-lg-3 col-md-6">
                        <div class="project_item clearfix">
                            <div class="pro__thumb">
                                <a href="{{route('product-details',[$product->id])}}"  class="img-hover">
                                    <img src="{{u($product->product_image) }}" alt="" class="img-responsive">
                                </a>
                            <div class="pro_cate">{{$product->type->name}}</div>
                            </div>
                            <div class="pro_caption">
                            <h2><a href="{{route('product-details',[$product->id])}}" >{{$product->name}}</a></h2>
                            <p>{{$product->description}}</p>
                                <div class="pc_ss clearfix">
                                    <div class="pro_salary">المبلغ {{$product->price}}<span>ر.س</span></div>
                                    <div class="pc_ss_left">
                                        <a href="{{route('product-details',[$product->id])}}"  class="pro_cart">
                                            <img src="{{theme_assets("images/add-to-the-cart.svg")}}" alt="">
                                        </a>
                                        <a href="{{route('product-details',[$product->id])}}"  class="boo_link"><span>1000 ر.س</span>تبرع الأن</a>
                                    </div>
                                </div>
                                <div class="pc_bb clearfix">
                                    @if ($product->containsGift)
                                    <div class="pro_gift">
                                            <img src="{{theme_assets("images/giftbox.svg")}}" alt="">
                                            <p>مرفق هدية</p>
                                        </div>
                                    @endif
                                    <div class="pro_share">
                                        <h3>مشاركة</h3>
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
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    <div class="section_ads">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-sm-12">
                            <a href="#" class="ads_block">
                                <img src="{{theme_assets("images/erer.png")}}" alt="" class="img-responsive">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12 col-sm-6">
                            <a href="#" class="ads_block">
                                <img src="{{theme_assets("images/er2.png")}}" alt="" class="img-responsive">
                            </a>
                        </div>
                        <div class="col-md-12 col-sm-6">
                            <a href="#" class="ads_block">
                                <img src="{{theme_assets("images/er3.png")}}" alt="" class="img-responsive">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12 col-sm-6">
                            <a href="#" class="ads_block">
                                <img src="{{theme_assets("images/er4.png")}}" alt="" class="img-responsive">
                            </a>
                        </div>
                        <div class="col-md-12 col-sm-6">
                            <a href="#" class="ads_block">
                                <img src="{{theme_assets("images/er5.png")}}" alt="" class="img-responsive">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!--section_project_top-->
<section class="section_home_projects">
    <div class="container">
        <div class="secPro_head clearfix">
            <h2>المشاريع المضافة حديثاً</h2>
            <a href="{{url('Product/filter/all/all/recently-added/all/10/2000/1,2,3,4,5/all/all/all')}}" class="h_more">عرض المزيد</a>
        </div>
        <div class="sec_warpper">
            <div class="ho_projects_list">
                <div class="row">
                        @foreach ($MostRecentProducts as $product)
                        <div class="col-lg-3 col-md-6">
                            <div class="project_item clearfix">
                                <div class="pro__thumb">
                                    <a href="{{route('product-details',[$product->id])}}" class="img-hover">
                                        <img src="{{u($product->product_image) }}" alt="" class="img-responsive">
                                    </a>
                                <div class="pro_cate">{{$product->type->name}}</div>
                                </div>
                                <div class="pro_caption">
                                <h2><a href="{{route('product-details',[$product->id])}}" >{{$product->name}}</a></h2>
                                <p>{{$product->description}}</p>
                                    <div class="pc_ss clearfix">
                                        <div class="pro_salary">المبلغ {{$product->price}}<span>ر.س</span></div>
                                        <div class="pc_ss_left">
                                            <a href="{{route('product-details',[$product->id])}}" class="pro_cart">
                                                <img src="{{theme_assets("images/add-to-the-cart.svg")}}" alt="">
                                            </a>
                                            <a href="{{route('product-details',[$product->id])}}" class="boo_link"><span>1000 ر.س</span>تبرع الأن</a>
                                        </div>
                                    </div>
                                    <div class="pc_bb clearfix">
                                        @if ($product->containsGift)
                                        <div class="pro_gift">
                                                <img src="{{theme_assets("images/giftbox.svg")}}" alt="">
                                                <p>مرفق هدية</p>
                                            </div>
                                        @endif
                                        <div class="pro_share">
                                            <h3>مشاركة</h3>
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
                                </div>
                            </div>
                        </div>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
</section><!--section_home_projects-->
<section class="section_home_projects section_bg">
    <div class="container">
        <div class="secPro_head clearfix">
            <h2>المشاريع التي تم تمويلها بالكامل</h2>
            <a href="{{url('Product/filter/all/all/fully-funded/all/10/2000/1,2,3,4,5/all/all/all')}}" class="h_more">عرض المزيد</a>
        </div>
        <div class="sec_warpper">
            <div class="ho_projects_list">
                <div class="row">
                    @foreach ($FullFundedProducts as $product)
                        <div class="col-lg-3 col-md-6">
                            <div class="project_item clearfix">
                                <div class="pro__thumb">
                                    <a href="{{route('product-details',[$product->id])}}" class="img-hover">
                                        <img src="{{u($product->product_image) }}" alt="" class="img-responsive">
                                    </a>
                                <div class="pro_cate">{{$product->type->name}}</div>
                                </div>
                                <div class="pro_caption">
                                <h2><a href="{{route('product-details',[$product->id])}}" >{{$product->name}}</a></h2>
                                <p>{{$product->description}}</p>
                                    <div class="pc_ss clearfix">
                                        <div class="pro_salary">المبلغ {{$product->price}}<span>ر.س</span></div>
                                        <div class="pc_ss_left">
                                            <a href="{{route('product-details',[$product->id])}}" class="pro_cart">
                                                <img src="{{theme_assets("images/add-to-the-cart.svg")}}" alt="">
                                            </a>
                                            <a href="{{route('product-details',[$product->id])}}" class="boo_link"><span>1000 ر.س</span>تبرع الأن</a>
                                        </div>
                                    </div>
                                    <div class="pc_bb clearfix">
                                        @if ($product->containsGift)
                                        <div class="pro_gift">
                                                <img src="{{theme_assets("images/giftbox.svg")}}" alt="">
                                                <p>مرفق هدية</p>
                                            </div>
                                        @endif
                                        <div class="pro_share">
                                            <h3>مشاركة</h3>
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
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section><!--section_home_projects-->
<section class="section_statistics">
    <div class="container">
        <h2 class="statistic_title">إنجازات تم تحقيقها</h2>
        <div class="statistic_list">
            <div class="row">
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="st__box">
                        <img src="{{theme_assets("images/st1.svg")}}" alt="" class="img-responsive">
                    <h2 class="counter">{{$FullFundedProductsCount}}</h2>
                        <p>مشروع ممول</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="st__box">
                        <img src="{{theme_assets("images/st2.svg")}}" alt="" class="img-responsive">
                    <h2 class="counter">{{$TotalDonations}}</h2>
                        <p>اجمالي التبرعات</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="st__box">
                        <img src="{{theme_assets("images/st3.svg")}}" alt="" class="img-responsive">
                        <h2 class="counter">2000</h2>
                        <p>عدد المستفيدين</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="st__box">
                        <img src="{{theme_assets("images/st4.svg")}}" alt="" class="img-responsive">
                        <h2 class="counter">2000</h2>
                        <p>عدد الأجزاء المحفوظة</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="st__box">
                        <img src="{{theme_assets("images/st5.svg")}}" alt="" class="img-responsive">
                        <h2 class="counter">2000</h2>
                        <p>عدد الأيات التي تم تعليمها</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="st__box">
                        <img src="{{theme_assets("images/st6.svg")}}" alt="" class="img-responsive">
                        <h2 class="counter">{{$TotalGifts}}</h2>
                        <p>هدية</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!--section_statistics-->
<section class="section_banner_slide">
    <div class="container">
        <div class="owl-carousel" id="banner_slide">
            @foreach ($BottomSlider->items as $item)
                <div class="item">
                    <div class="banner_item">
                        <a href="{{$item->url}}" target="_blank" class="donation_link">
                                <img src="{{u($item->image)}}" alt="{{$item->name}}" class="img-responsive">
                            </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section><!--section_banner_slide-->
<section class="section_home_projects">
    <div class="container">
        <div class="secPro_head clearfix">
            <h2>مشاريع الزكاة</h2>
            <a href="#" class="h_more">عرض المزيد</a>
        </div>
        <div class="sec_warpper">
            <div class="ho_projects_list">
                    <div class="row">
                            @foreach ($ZakatProducts as $product)
                            <div class="col-lg-3 col-md-6">
                                <div class="project_item clearfix">
                                    <div class="pro__thumb">
                                        <a href="{{route('product-details',[$product->id])}}" class="img-hover">
                                            <img src="{{u($product->product_image) }}" alt="" class="img-responsive">
                                        </a>
                                    <div class="pro_cate">{{$product->type->name}}</div>
                                    </div>
                                    <div class="pro_caption">
                                    <h2><a href="{{route('product-details',[$product->id])}}" >{{$product->name}}</a></h2>
                                    <p>{{$product->description}}</p>
                                        <div class="pc_ss clearfix">
                                            <div class="pro_salary">المبلغ {{$product->price}}<span>ر.س</span></div>
                                            <div class="pc_ss_left">
                                                <a href="{{route('product-details',[$product->id])}}" class="pro_cart">
                                                    <img src="{{theme_assets("images/add-to-the-cart.svg")}}" alt="">
                                                </a>
                                                <a href="{{route('product-details',[$product->id])}}" class="boo_link"><span>1000 ر.س</span>تبرع الأن</a>
                                            </div>
                                        </div>
                                        <div class="pc_bb clearfix">
                                            @if ($product->containsGift)
                                            <div class="pro_gift">
                                                    <img src="{{theme_assets("images/giftbox.svg")}}" alt="">
                                                    <p>مرفق هدية</p>
                                                </div>
                                            @endif
                                            <div class="pro_share">
                                                <h3>مشاركة</h3>
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
                                    </div>
                                </div>
                            </div>
                            @endforeach
                    </div>
            </div>
        </div>
    </div>
</section><!--section_home_projects-->
<section class="section_subscribe">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-11">
                <div class="row">
                    <div class="col-md-6">
                        <div class="scribe_right clearfix">
                            <img src="{{theme_assets("images/mail.svg")}}" alt="" class="img-responsive">
                            <div class="scribe_txt">
                                <h2>الاشتراك في القائمة البريدية</h2>
                                <p>اشترك ليصلك أحدث الأخبار والعروض من متجر خيركم</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <form class="form_scribe" action="{{route('subscribeMailList')}}" method="POST">
                            @csrf
                            <input type="email" name="email" class="form-control" placeholder="بريدك الالكتروني">
                            <button type="submit" class="btn btn_scribe">اشتراك</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!--section_subscribe-->
<section class="section_feature">
    <div class="container">
        <div class="feature_list">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="feature_item">
                        <img src="{{theme_assets("images/fea1.svg")}}" alt="" class="img-responsive">
                        <h3>القيمة العظمى</h3>
                        <p>التبرع الأمثل لدعم تعليم القرآن الكريم</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="feature_item">
                        <img src="{{theme_assets("images/fea2.svg")}}" alt="" class="img-responsive">
                        <h3>حلول دفع آمنة</h3>
                        <p>بالبطاقة الائتمانية أو التحويل المصرفي</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="feature_item">
                        <img src="{{theme_assets("images/fea3.svg")}}" alt="" class="img-responsive">
                        <h3>التوصيل السريع</h3>
                        <p>توصيل سريع للهدايا والمواد العينية</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="feature_item">
                        <img src="{{theme_assets("images/fea4.svg")}}" alt="" class="img-responsive">
                        <h3>مركز خدمة العملاء</h3>
                        <p>نحن جاهزون دائما لمساعدتكم وخدمتكم</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!--section_feature-->
@endsection

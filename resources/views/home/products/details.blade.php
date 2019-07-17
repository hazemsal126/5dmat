@extends('app')

@section('title', 'الصفحة الرئيسية')
@section('styles')
    <link  href="{{theme_assets('css/lightslider.css')}}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.css" />
	<link rel="stylesheet" type="text/css" href="{{theme_assets('js/slick/slick.css')}}"/>
@endsection
@section('content')
<div class="breadcrumb_content">
        <div class="container">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('home')}}">الرئيسية</a></li>
                {{-- <li class="breadcrumb-item"><a href="#">منتجات الزكاة  </a></li> --}}
                <li class="breadcrumb-item"><a href="#">{{$product->type->name}}</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{$product->name}}</li>
              </ol>
            </nav>
        </div>
    </div>
    <div class="page_inner_content">
        <section class="product-details">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">

                        @php
                        $av30=intval(($product->acquired_amount/$product->target_amount)*30);
                        $av15=intval(($product->acquired_amount/$product->target_amount)*15);
                        @endphp
                        <ul id="imageGallery">
                            <li data-thumb="{{u($product->product_image)}}" data-src="{{u($product->product_image)}}">
                                <img src="{{u($product->product_image)}}" />
                              </li>
                              @isset($product->photos)
                              @foreach ($product->photos as $photo)
                            <li data-thumb="{{u($photo)}}" data-src="{{u($photo)}}">
                           <img src="{{u($photo)}}" />
                         </li>
                       @endforeach
                       @endisset

                        </ul>
                    </div>
                    <div class="col-md-6">
                        <div class="text-entry">
                            @if($product->style == 1)
                            <div class="progress">
                                    <div class="progress-bar" style="background-color: #c2a84b; width:{{($av30/30)*100}}%">{{intval(($av30/30)*100)}}%</div>
                                  </div>
                                  <hr>
                        @elseif($product->style == 2)
                             <div class="quran">
                            <div class="img"><img src="{{theme_assets('images/q.png')}}" alt=""></div>
                            @for($i=1;$i<16;$i++)
                                <span class="q{{$i}} item @if($i<= $av15) active @endif"></span>
                                @endfor
                            </div>
                            <div class="progress">
                                    <div class="progress-bar" style="background-color: #c2a84b; width:{{($av15/15)*100}}%">{{intval(($av15/15)*100)}}%</div>
                                  </div>
                            <hr>
                            @elseif($product->style == 3)
                            <div class="quran2">
                            @for($i=1;$i<31;$i++)
									<span class="item @if($i<= $av30) active @endif">{{$i}}</span>
									@endfor
                                </div>
                                <div class="progress">
                                        <div class="progress-bar" style="background-color: #c2a84b; width:{{($av30/30)*100}}%">{{intval(($av30/30)*100)}}%</div>
                                      </div>
                                <hr>
                            @elseif($product->style == 4)
                                <div class="quran3">
                            @for($i=1;$i<31;$i++)
                                        <span class="item @if($i<= $av30) active @endif"></span>
                                        @endfor
                                    </div>
                                    <div class="progress">
                                            <div class="progress-bar" style="background-color: #c2a84b; width:{{($av30/30)*100}}%">{{intval(($av30/30)*100)}}%</div>
                                          </div>
                                    <hr>

                            @endif

                        <h3>{{$product->name}}</h3>

                            <div class="Rfield Rfield-prod">
                                <label>
                                    @for ($i = 0; $i < $rating_avg; $i++)
                                        <i class="fas fa-star"></i>
                                    @endfor
                                    @for ($i = $rating_avg; $i < 5; $i++)
                                        <i class="fal fa-star"></i>
                                    @endfor
                                </label>
                               </div>

                            <p>{{$product->description}}</p>

                            <div class="price">
                                <strong>المبلغ</strong>
                                <span>{{$product->price}}  ر.س </span>
                            </div>
                        <form action="{{route('add-to-cart')}}" method="POST">
                            @csrf
                            <input type="hidden" name="productId" value="{{$product->id}}"/>
                            <div class="btns row mt-3">
                                 <div class="col-sm-4">
                                     <div class="quantity-products">
                                         <label for="qnt">العدد  </label>
                                         <select name="qnt" id="qnt">
                                             <option value="1">1</option>
                                             <option value="2">2</option>
                                             <option value="3">3</option>
                                             <option value="4">4</option>
                                             <option value="5">5</option>
                                             <option value="6">6</option>
                                             <option value="7">7</option>
                                             <option value="8">8</option>
                                             <option value="9">9</option>
                                             <option value="10">10</option>
                                         </select>
                                     </div>
                                 </div>
                                 <div class="col-sm-4">
                                     <button type="submit" name="addToCart" class="btn product-cart-btn btn_nn1">إضافة الى سلة التبرعات</button>
                                 </div>
                                 <div class="col-sm-4">
                                     <button type="submit" name="donateNow" class="btn product-cart-btn btn_orange">تبرع الأن </button>
                                 </div>
                            </div>
                            <div class="prod-note text-center mt-3">
                                <div class="row">
                                    <div class="col-2"> <div class="note-title">ملاحظة</div></div>
                                    <div class="col-10">
                                        <p>تم التبرع و دعم هذه الحلقة
                                        <br>
                                        عدد الختمات   {{$product->order_items_count}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </form>

                            <div class="share-prod mt-3">
                                <div class="row">
                                    <div class="col-sm-6"><span>شارك الرابط مع غيرك لتكسب الأجر</span></div>
                                    <div class="col-sm-6">
                                        <div class="share-links">
                                            <a href="" class="facebook-c"><i class="fab fa-facebook-f"></i></a>
                                            <a href="" class="twitter-c"><i class="fab fa-twitter"></i></a>
                                            <a href="" class="insta-c"><i class="fab fa-instagram"></i></a>
                                            <a href="" class="whatsapp-c"><i class="fab fa-whatsapp"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="reviewBlk mt-5">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="tab1-prod-tab" data-toggle="tab" href="#tab1-prod" role="tab" aria-controls="tab1-prod" aria-selected="true">التفاصيل</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="tap2-prod-tab" data-toggle="tab" href="#tap2-prod" role="tab" aria-controls="tap2-prod" aria-selected="false">
                            التقييمات ({{$product->ratings_count}})
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="tap3-prod-tab" data-toggle="tab" href="#tap3-prod" role="tab" aria-controls="tap3-prod" aria-selected="false">الشحن</a>
                      </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                      <div class="tab-pane fade show active" id="tab1-prod" role="tabpanel" aria-labelledby="tab1-prod-tab">
                          <p>{{$product->full_details}}</p>

                      </div>
                      <div class="tab-pane fade" id="tap2-prod" role="tabpanel" aria-labelledby="tap2-prod-tab">

                            <div class="review-info">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="num">{{$rating_avg}}</div>
                                        <h4>متوسط التقييم</h4>
                                        <div class="Rfield Rfield-prod text-center">
                                            <label>
                                                @for ($i = 0; $i < $rating_avg; $i++)
                                                    <i class="fas fa-star"></i>
                                                @endfor
                                                @for ($i = $rating_avg; $i < 5; $i++)
                                                    <i class="fal fa-star"></i>
                                                @endfor
                                            </label>
                                           </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="bars">
                                            @foreach($ratings as $rating)
                                            <div class="row">
                                                <div class="col-10"><div class="bar"><span  style="width: {{$rating->avg*100}}%;"></span></div></div>
                                                <div class="col-2">{{$rating->value}}</div>
                                            </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="reviews">
                                @foreach ($product->ratings as $rating)

                                    <div class="item">
                                        <div class="user-stars">
                                            <div class="Rfield Rfield-prod">
                                                <label>
                                                    @for ($i = 0; $i < $rating->value; $i++)
                                                        <i class="fas fa-star"></i>
                                                    @endfor
                                                    @for ($i = $rating->value; $i < 5; $i++)
                                                        <i class="fal fa-star"></i>
                                                    @endfor
                                                </label>
                                            </div>
                                        </div>
                                        <div class="username">
                                        <h3>{{$rating->user->name}}</h3>  <span>{{ Carbon\Carbon::parse($rating->created_at)->format('d-m-Y') }}</span>
                                        </div>
                                        <div class="text-entry">
                                        <p>{{$rating->message}}</p>
                                        </div>
                                    </div>
                                @endforeach

                                <ul class="pagination clearfix mt-5">
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
                      <div class="tab-pane fade" id="tap3-prod" role="tabpanel" aria-labelledby="tap3-prod-tab">

                              <p>"لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور  أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . ي</p>
                        <p>وت انيم أد مينيم فينايم,كيواس نوستريد أكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات . ديواس أيوتي أريري دولار إن ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم دولار أيو فيجايت نيولا باراياتيور. أيكسسيبتيور ساينت أوككايكات كيوبايداتات نون بروايدينت ,سيونت ان كيولبا كيو أوفيسيا ديسيريونتموليت انيم أيدي ايست لابوريو سيت يتبيرسبايكياتيس يوندي أومنيس أستي ناتيس أيررور سيت فوليبتاتيم أكيسأنتييوم
                            دولاريمكيو لايودانتيوم,توتام ريم أبيرأم,أيكيو أبسا كيواي أب أللو أنفينتوري فيرأتاتيس ايت كياسي أرشيتيكتو بيتاي فيتاي ديكاتا سيونت أكسبليكابو. نيمو أنيم أبسام فوليوباتاتيم كيواي</p>


                          <p>"لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور  أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . ي</p>
                        <p>وت انيم أد مينيم فينايم,كيواس نوستريد أكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات . ديواس أيوتي أريري دولار إن ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم دولار أيو فيجايت نيولا باراياتيور. أيكسسيبتيور ساينت أوككايكات كيوبايداتات نون بروايدينت ,سيونت ان كيولبا كيو أوفيسيا ديسيريونتموليت انيم أيدي ايست لابوريو سيت يتبيرسبايكياتيس يوندي أومنيس أستي ناتيس أيررور سيت فوليبتاتيم أكيسأنتييوم
                            دولاريمكيو لايودانتيوم,توتام ريم أبيرأم,أيكيو أبسا كيواي أب أللو أنفينتوري فيرأتاتيس ايت كياسي أرشيتيكتو بيتاي فيتاي ديكاتا سيونت أكسبليكابو. نيمو أنيم أبسام فوليوباتاتيم كيواي</p>

                      </div>
                    </div>

                </div>
            </div>
        </section>

        <div class="related_block_pro section_bg">
            <div class="container">
                <div class="secPro_head clearfix">
                    <h2>منتجات مشابهة </h2>
                    <a href="#" class="h_more">عرض المزيد</a>
                </div>
                <div class="sec_warpper">
                    <div class="ho_projects_list">
                        <div class="row">
                            @foreach ($similarProducts as $item)
                                <div class="col-lg-3 col-md-6">
                                    <div class="project_item clearfix">
                                        <div class="pro__thumb">
                                            <a href="{{route('product-details',[$item->id])}}">
                                                <img src="{{u($item->product_image)}}" alt="" class="img-responsive">
                                            </a>
                                            <div class="pro_cate">{{$item->type->name}}</div>
                                        </div>
                                        <div class="pro_caption">
                                            <h2><a href="{{route('product-details',[$item->id])}}">{{$item->name}}</a></h2>
                                            <p>{{$item->description}}</p>
                                            <div class="pc_ss clearfix">
                                                <div class="pro_salary">المبلغ {{$item->price}}<span>ر.س</span></div>
                                                <div class="pc_ss_left">
                                                    <a href="{{route('product-details',[$item->id])}}" class="pro_cart">
                                                        <img src="{{theme_assets("images/add-to-the-cart.svg")}}" alt="">
                                                    </a>
                                                    <a href="{{route('product-details',[$item->id])}}" class="boo_link"><span>1000 ر.س</span>تبرع الأن</a>
                                                </div>
                                            </div>
                                            <div class="pc_bb clearfix">
                                                @if ($item->containsGift)
                                                <div class="pro_gift">
                                                    <img src="{{theme_assets(" images/giftbox.svg ")}}" alt="">
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
        </div>
        <div class="related_block_pro">
            <div class="container">
                <div class="secPro_head clearfix">
                    <h2>{{$other_category->name}}   </h2>
                    <a href="#" class="h_more">عرض المزيد</a>
                </div>
                <div class="sec_warpper">
                    <div class="ho_projects_list">
                        <div class="row">
                            @foreach ($other_products as $item)
                                <div class="col-lg-3 col-md-6">
                                    <div class="project_item clearfix">
                                        <div class="pro__thumb">
                                            <a href="{{route('product-details',[$item->id])}}">
                                                <img src="{{u($item->product_image)}}" alt="" class="img-responsive">
                                            </a>
                                            <div class="pro_cate">{{$item->type->name}}</div>
                                        </div>
                                        <div class="pro_caption">
                                            <h2><a href="{{route('product-details',[$item->id])}}">{{$item->name}}</a></h2>
                                            <p>{{$item->description}}</p>
                                            <div class="pc_ss clearfix">
                                                <div class="pro_salary">المبلغ {{$item->price}}<span>ر.س</span></div>
                                                <div class="pc_ss_left">
                                                    <a href="{{route('product-details',[$item->id])}}" class="pro_cart">
                                                        <img src="{{theme_assets("images/add-to-the-cart.svg")}}" alt="">
                                                    </a>
                                                    <a href="{{route('product-details',[$item->id])}}" class="boo_link"><span>1000 ر.س</span>تبرع الأن</a>
                                                </div>
                                            </div>
                                            <div class="pc_bb clearfix">
                                                @if ($item->containsGift)
                                                <div class="pro_gift">
                                                    <img src="{{theme_assets(" images/giftbox.svg ")}}" alt="">
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
        </div>
    </div>
@endsection
@section('scripts')
<script src="{{theme_assets("js/lightslider.js")}}"></script>
<script src="{{theme_assets("js/slick/slick.min.js")}}"></script>
<script type="text/javascript">
     /*slide img*/
jQuery(document).ready(function( $ ) {
    $('#imageGallery').lightSlider({
        gallery:true,
        item:1,
        loop:true,
        rtl:true,
        thumbItem:4,
        slideMargin: 20,
        enableDrag: true,
        currentPagerPosition:'right',
        onSliderLoad: function(el) {
            el.lightGallery({
                selector: '#imageGallery .lslide'
            });
        }
    });
});

</script>
@endsection

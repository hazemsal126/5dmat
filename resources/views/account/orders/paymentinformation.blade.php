 @extends('app')

@section('title', 'العنوانين')

@section('content')
<div class="payment__page">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-lg-7 col-md-10">
                <div class="wizard-inner">
                    <div class="line_wizerd">
                        <div class="line_wi_in" style="background-color: #93A445; width: 50%;"></div>
                    </div>
                    <div class="wizerd_box clearfix">
                        <div class="wiz-block done">
                            <span class="www_circle"><i class="fal fa-check"></i></span>
                            <p>عنوان الشحن</p>
                        </div>
                        <div class="wiz-block done">
                            <span class="www_circle"><i class="fal fa-check"></i></span>
                            <p>بيانات الدفع</p>
                        </div>
                        <div class="wiz-block">
                            <span class="www_circle"><i class="fal fa-check"></i></span>
                            <p>التأكيد</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content_wizerd">
            <h2>الدفع</h2>
        </div>
        <div class="payment__block_div">
            <h3>الدفع عن طريق</h3>
            <div class="row">
                <div class="col-lg-9">
                    <div class="payment__block_right">
                        <div class="mmm_payment">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="pp_mitem">
                                        <input type="radio" class="check_pp" name="pay" checked>
                                        <div class="pp_mitem_box">
                                        <img src="{{theme_assets("images/sdw.svg")}}" alt="">
                                            <p>البطاقة الائتمانية</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="pp_mitem">
                                        <input type="radio" name="pay" class="check_pp">
                                        <div class="pp_mitem_box">
                                            <img src="{{theme_assets("images/mada.svg")}}" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="pp_mitem">
                                        <input type="radio" name="pay" class="check_pp">
                                        <div class="pp_mitem_box">
                                            <img src="{{theme_assets("images/museum.svg")}}" alt="">
                                            <p>حوالة بنكية</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form_payment">
                            <form class="form_pay" action="{{route('dopayment')}}" method="GET">
                                @csrf
                                <input name="address" value="{{$address}}" type="hidden">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>رقم البطاقة</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>اسم حامل البطاقة</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>تاريخ انتهاء البطاقة</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="الشهر   /   السنة">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>CVV</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-md-center">
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-block btn_buy">إكمال الدفع</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="payment_accordion">
                            <div id="accordion">
                              <div class="card">
                                <div class="card-header" id="headingOne">
                                  <h5 class="mb-0">
                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                      تبرع لمرة واحدة<span class="arrow_coll"><i class="far fa-angle-down"></i></span>
                                    </button>
                                  </h5>
                                </div>

                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                  <div class="card-body">
                                    <div class="item_cart_block">
                                        <div class="row">
                                            <div class="col-md-10">
                                                <div class="item_cr">
                                                    <a href="#" class="item_cr_thumb">
                                                        <img src="{{theme_assets("images/ce.png")}}" alt="" class="img-responsive">
                                                    </a>
                                                    <div class="item_cr_txt">
                                                        <h2><a href="#">حلقة تحفيظ القران الكريم مكونة من 15 طالب</a></h2>
                                                        <p>لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم مطبوعه ... بروشور ... او نماذج مواقع انترنت</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="pp_sa">المبلغ<span>1000 ريال</span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item_cart_block">
                                        <div class="row">
                                            <div class="col-md-10">
                                                <div class="item_cr">
                                                    <a href="#" class="item_cr_thumb">
                                                        <img src="{{theme_assets("images/ce.png")}}" alt="" class="img-responsive">
                                                    </a>
                                                    <div class="item_cr_txt">
                                                        <h2><a href="#">حلقة تحفيظ القران الكريم مكونة من 15 طالب</a></h2>
                                                        <p>لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم مطبوعه ... بروشور ... او نماذج مواقع انترنت</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="pp_sa">المبلغ<span>1000 ريال</span></div>
                                            </div>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="card">
                                <div class="card-header" id="headingTwo">
                                  <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                      تبرع بشكل مستمر<span class="arrow_coll"><i class="far fa-angle-down"></i></span>
                                    </button>
                                  </h5>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                  <div class="card-body">
                                    <div class="item_cart_block">
                                        <div class="row">
                                            <div class="col-md-10">
                                                <div class="item_cr">
                                                    <a href="#" class="item_cr_thumb">
                                                        <img src="{{theme_assets("images/ce.png")}}" alt="" class="img-responsive">
                                                    </a>
                                                    <div class="item_cr_txt">
                                                        <h2><a href="#">حلقة تحفيظ القران الكريم مكونة من 15 طالب</a></h2>
                                                        <p>لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم مطبوعه ... بروشور ... او نماذج مواقع انترنت</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="pp_sa">المبلغ<span>1000 ريال</span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item_cart_block">
                                        <div class="row">
                                            <div class="col-md-10">
                                                <div class="item_cr">
                                                    <a href="#" class="item_cr_thumb">
                                                        <img src="{{theme_assets("images/ce.png")}}" alt="" class="img-responsive">
                                                    </a>
                                                    <div class="item_cr_txt">
                                                        <h2><a href="#">حلقة تحفيظ القران الكريم مكونة من 15 طالب</a></h2>
                                                        <p>لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم مطبوعه ... بروشور ... او نماذج مواقع انترنت</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="pp_sa">المبلغ<span>1000 ريال</span></div>
                                            </div>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="card">
                                <div class="card-header" id="headingThree">
                                  <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                      هدايا ومنتجات ( شحن )<span class="arrow_coll"><i class="far fa-angle-down"></i></span>
                                    </button>
                                  </h5>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                  <div class="card-body">
                                    <div class="item_cart_block">
                                        <div class="row">
                                            <div class="col-md-10">
                                                <div class="item_cr">
                                                    <a href="#" class="item_cr_thumb">
                                                        <img src="{{theme_assets("images/ce.png")}}" alt="" class="img-responsive">
                                                    </a>
                                                    <div class="item_cr_txt">
                                                        <h2><a href="#">حلقة تحفيظ القران الكريم مكونة من 15 طالب</a></h2>
                                                        <p>لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم مطبوعه ... بروشور ... او نماذج مواقع انترنت</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="pp_sa">المبلغ<span>1000 ريال</span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item_cart_block">
                                        <div class="row">
                                            <div class="col-md-10">
                                                <div class="item_cr">
                                                    <a href="#" class="item_cr_thumb">
                                                        <img src="{{theme_assets("images/ce.png")}}" alt="" class="img-responsive">
                                                    </a>
                                                    <div class="item_cr_txt">
                                                        <h2><a href="#">حلقة تحفيظ القران الكريم مكونة من 15 طالب</a></h2>
                                                        <p>لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم مطبوعه ... بروشور ... او نماذج مواقع انترنت</p>
                                                    </div>
                                                </div>
                                                <div class="shipping_block clearfix">
                                                    <h3>شركة الشحن</h3>
                                                    <div class="select_shipping dropdown">
                                                        <button type="button" class="btn btn-block dropdown-toggle" data-toggle="dropdown">شركة الشحن الأولى</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="pp_sa">المبلغ<span>1000 ريال</span></div>
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
                <div class="col-lg-3">
                    <div class="pay_side">
                        <div class="pay__details">
                            <h2>التفاصيل</h2>
                            <ul>
                                <li>التبرع لمرة واحدة<span>1000 ريال</span></li>
                                <li>المجموع الكلي<span>1000 ريال</span></li>
                            </ul>
                        </div>
                        <div class="pay__info_two">
                            <h3>ما هو التبرع لمرة واحدة؟</h3>
                            <p>سيتم دفع تبرعاتك المختارة لمرة واحدة فقط</p>
                            <h3>ما هو الأجر المستديم؟</h3>
                            <p>تبرعات يمكنك جدولتها لتصبح دورية بشكل يومي أو أسبوعي أو شهري من خلال بطاقتك الائتمانية. كما يمكن تقسيط بعض المشاريع ذات القيمة الكبيرة على عدة أشهر</p>
                            <h3>طرق التبرع</h3>
                            <div class="pppp_ibn">
                                <h3>بطاقة ائتمانية</h3>
                                <p>بطاقة تتيح الدفع الآجل من رصيدك البنكي (فيزا كارد أو ماستر كارد)</p>
                                <h3>مدى باي</h3>
                                <p>بطاقة تتيح الدفع الالكتروني من رصيدك</p>
                                <h3>الحوالة البنكية</h3>
                                <p>يمكنك ارسال حوالة بنكية من خلال اختيار البنك الذي تريد والدفع، ويرجى ارفاق صورة لمعاملة الحوالة وباقي التفاصيل المذكورة في صفحة الدفع</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

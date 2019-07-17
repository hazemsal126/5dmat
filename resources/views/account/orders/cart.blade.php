@extends('app')

@section('title', 'العنوانين')

@section('content')
<div class="content_skin_page">
    <div class="container">
        <h2 class="title_page">سلة التبرعات<span>( مشاريع تبرعات) {{count($items)}}</span></h2>
        <div class="cart_block">
            <div class="row">
                <div class="col-lg-9 col-md-8">
                    <div class="item_list_cart">
                        @foreach ($items as $item)
                            <div class="item_cart_block">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="item_cr">
                                        <a href="{{route('product-details',[$item["attributes"]["product"]["id"]])}}" class="item_cr_thumb">
                                            <img src="{{u($item["attributes"]["product"]["product_image"])}}" alt="" class="img-responsive">
                                            </a>
                                            <div class="item_cr_txt">
                                            <h2><a href="#">{{$item['name']}}</a></h2>
                                            <p>{{$item["attributes"]["product"]["description"][
                                                    l()
                                                ]}}</p>
                                            </div>
                                        </div>
                                        {{-- <div class="shipping_block clearfix">
                                            <h3>شركة الشحن</h3>
                                            <div class="select_shipping dropdown">
                                                <button type="button" class="btn btn-block dropdown-toggle" data-toggle="dropdown">شركة الشحن الأولى</button>
                                            </div>
                                        </div> --}}
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="qun_cr">
                                            <h3>المبلغ</h3>
                                            <input type="text" class="form-control" readonly value="{{$item['price']}}">
                                        </div>
                                        <div class="remove_cr">
                                        <a href="{{route('removeCartItem',[$item["id"]])}}"><i class="fal fa-trash-alt"></i> إزالة</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="action_cart">
                        <a href="#" class="continue_shop">متابعة التبرع</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <div class="side_cart">
                        <div class="total_block">
                            <h3>ملخص الطلبية</h3>
                            <div class="total_row clearfix">
                                <h3>المجموع الفرعي‏</h3>
                                <p>{{$subTotal}} ر.س.</p>
                            </div>
                            <div class="total_row clearfix">
                                <h3>الشحن</h3>
                                <p>مجاني</p>
                            </div>
                            <div class="full_total">
                                <div class="total_row clearfix">
                                    <h3>المجموع</h3>
                                    <p>{{$total}} ر.س.</p>
                                </div>
                            </div>
                        </div>
                        <a href="{{route('shipping')}}" class="btn btn-block btn_buy">شراء الأن</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="related_block_pro">
            <div class="secPro_head clearfix">
                <h2>مشاريع تبرعات مشابهة</h2>
                <a href="#" class="h_more">عرض المزيد</a>
            </div>
            <div class="sec_warpper">
                <div class="ho_projects_list">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="project_item clearfix">
                                <div class="pro__thumb">
                                    <a href="#" class="img-hover">
                                        <img src="images/pro.png" alt="" class="img-responsive">
                                    </a>
                                    <div class="pro_cate">الزكاة</div>
                                </div>
                                <div class="pro_caption">
                                    <h2><a href="#">مشروع حلقة تحفيظ القرآن الكريم</a></h2>
                                    <p>حلقة تحفيظ القرأن الكريم تحتوى على 15 حافظ لكتاب الله, حلقة تحفيظ القرأن الكريم تحتوى على 15 حافظ لكتاب الله, حلقة تحفيظ القرأن الكريم تحتوى على 15 حافظ لكتاب الله, حلقة تحفيظ القرأن الكريم تحتوى على 15 حافظ لكتاب الله</p>
                                    <div class="pc_ss clearfix">
                                        <div class="pro_salary">المبلغ 315<span>ر.س</span></div>
                                        <div class="pc_ss_left">
                                            <a href="#" class="pro_cart">
                                                <img src="images/add-to-the-cart.svg" alt="">
                                            </a>
                                            <a href="#" class="boo_link"><span>1000 ر.س</span>تبرع الأن</a>
                                        </div>
                                    </div>
                                    <div class="pc_bb clearfix">
                                        <div class="pro_gift">
                                            <img src="images/giftbox.svg" alt="">
                                            <p>مرفق هدية</p>
                                        </div>
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
                        <div class="col-lg-3 col-md-6">
                            <div class="project_item clearfix">
                                <div class="pro__thumb">
                                    <a href="#" class="img-hover">
                                        <img src="images/pro.png" alt="" class="img-responsive">
                                    </a>
                                    <div class="pro_cate">الزكاة</div>
                                </div>
                                <div class="pro_caption">
                                    <h2><a href="#">مشروع حلقة تحفيظ القرآن الكريم</a></h2>
                                    <p>حلقة تحفيظ القرأن الكريم تحتوى على 15 حافظ لكتاب الله, حلقة تحفيظ القرأن الكريم تحتوى على 15 حافظ لكتاب الله, حلقة تحفيظ القرأن الكريم تحتوى على 15 حافظ لكتاب الله, حلقة تحفيظ القرأن الكريم تحتوى على 15 حافظ لكتاب الله</p>
                                    <div class="pc_ss clearfix">
                                        <div class="pro_salary">المبلغ 315<span>ر.س</span></div>
                                        <div class="pc_ss_left">
                                            <a href="#" class="pro_cart">
                                                <img src="images/add-to-the-cart.svg" alt="">
                                            </a>
                                            <a href="#" class="boo_link"><span>1000 ر.س</span>تبرع الأن</a>
                                        </div>
                                    </div>
                                    <div class="pc_bb clearfix">
                                        <div class="pro_gift">
                                            <img src="images/giftbox.svg" alt="">
                                            <p>مرفق هدية</p>
                                        </div>
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
                        <div class="col-lg-3 col-md-6">
                            <div class="project_item clearfix">
                                <div class="pro__thumb">
                                    <a href="#" class="img-hover">
                                        <img src="images/pro.png" alt="" class="img-responsive">
                                    </a>
                                    <div class="pro_cate">الزكاة</div>
                                </div>
                                <div class="pro_caption">
                                    <h2><a href="#">مشروع حلقة تحفيظ القرآن الكريم</a></h2>
                                    <p>حلقة تحفيظ القرأن الكريم تحتوى على 15 حافظ لكتاب الله, حلقة تحفيظ القرأن الكريم تحتوى على 15 حافظ لكتاب الله, حلقة تحفيظ القرأن الكريم تحتوى على 15 حافظ لكتاب الله, حلقة تحفيظ القرأن الكريم تحتوى على 15 حافظ لكتاب الله</p>
                                    <div class="pc_ss clearfix">
                                        <div class="pro_salary">المبلغ 315<span>ر.س</span></div>
                                        <div class="pc_ss_left">
                                            <a href="#" class="pro_cart">
                                                <img src="images/add-to-the-cart.svg" alt="">
                                            </a>
                                            <a href="#" class="boo_link"><span>1000 ر.س</span>تبرع الأن</a>
                                        </div>
                                    </div>
                                    <div class="pc_bb clearfix">
                                        <div class="pro_gift">
                                            <img src="images/giftbox.svg" alt="">
                                            <p>مرفق هدية</p>
                                        </div>
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
                        <div class="col-lg-3 col-md-6">
                            <div class="project_item clearfix">
                                <div class="pro__thumb">
                                    <a href="#" class="img-hover">
                                        <img src="images/pro.png" alt="" class="img-responsive">
                                    </a>
                                    <div class="pro_cate">الزكاة</div>
                                </div>
                                <div class="pro_caption">
                                    <h2><a href="#">مشروع حلقة تحفيظ القرآن الكريم</a></h2>
                                    <p>حلقة تحفيظ القرأن الكريم تحتوى على 15 حافظ لكتاب الله, حلقة تحفيظ القرأن الكريم تحتوى على 15 حافظ لكتاب الله, حلقة تحفيظ القرأن الكريم تحتوى على 15 حافظ لكتاب الله, حلقة تحفيظ القرأن الكريم تحتوى على 15 حافظ لكتاب الله</p>
                                    <div class="pc_ss clearfix">
                                        <div class="pro_salary">المبلغ 315<span>ر.س</span></div>
                                        <div class="pc_ss_left">
                                            <a href="#" class="pro_cart">
                                                <img src="images/add-to-the-cart.svg" alt="">
                                            </a>
                                            <a href="#" class="boo_link"><span>1000 ر.س</span>تبرع الأن</a>
                                        </div>
                                    </div>
                                    <div class="pc_bb clearfix">
                                        <div class="pro_gift">
                                            <img src="images/giftbox.svg" alt="">
                                            <p>مرفق هدية</p>
                                        </div>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
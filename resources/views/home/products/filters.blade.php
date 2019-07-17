@extends('app') 
@section('title', 'الصفحة الرئيسية') 
@section('scripts')
<script>
    $(function () { 
        $(".fig_body ul li a label input").on('click',function(e){
            $el =  $(this).parent().parent().parent();
            $el.parent().find("li").removeClass("active");
            $el.addClass("active");
            // $("a label input",$(this)).click();
            // console.log($(this).index());
        });
     })

</script>
@endsection
 
@section('content')
{{-- price_filters => {{old('price_filters')}}<br/>
project_filters => {{old('project_filters')}}<br/>
price_range_start => {{old('price_range_start')}}<br/>
price_range_end => {{old('price_range_end')}}<br/> --}}
{{-- product_type => {{old('product_type')}}<br/> --}}
{{-- product_evaluation => {{old('product_evaluation')}}<br/> --}}
{{-- gift_type => {{old('gift_type')}}<br/> --}}
{{-- shipping => {{old('shipping')}}<br/> --}}
<div class="page_inner_content">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4"> 
                <form action="{{ url()->current()}}" method="POST">
                    @csrf
                    <div class="side_filter_groups">
                        <div class="filter_group">
                            <div class="fig_head clearfix">
                                <h3>تصنيف المشاريع</h3>
                                <button class="toggle_filter"><i class="fal fa-angle-down"></i></button>
                            </div>
                            <div class="fig_body">
                                <ul>
                                    <li {{$filters['project_filters'] == 'mostDonation' ? "class=active" : ""}}>
                                    <a href="#">
                                            <label>الأكثر تبرعاً <input type="radio" name="project_filters" value="mostDonation" {{$filters['project_filters'] == 'mostDonation' ? "checked" : ""}} /></label>
                                        </a>
                                    </li>
                                    <li {{$filters['project_filters'] == 'recently-added' ? "class=active" : ""}}><a href="#">
                                            <label>المضافة حديثاً <input type="radio" name="project_filters" value="recently-added" {{$filters['project_filters'] == 'recently-added' ? "checked" : ""}} /></label>
                                        </a></li>
                                    <li {{$filters['project_filters'] == 'fully-funded' ? "class=active" : ""}}><a href="#">
                                            <label>تم تمويلها بالكامل <input type="radio" name="project_filters" value="fully-funded" {{$filters['project_filters'] == 'fully-funded' ? "checked" : ""}} /></label>
                                        </a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="filter_group">
                            <div class="fig_head clearfix">
                                <h3>السعر</h3>
                                <button class="toggle_filter"><i class="fal fa-angle-down"></i></button>
                            </div>
                            <div class="fig_body">
                                <ul>
                                    <li><a href="#">
                                                <label>الأعلى سعراً <input type="radio" name="price_filters" value="high_prices" {{$filters['price_filters'] == 'high_prices' ? "checked" : ""}} /></label>
                                            </a>
                                    </li>
                                    <li><a href="#">
                                                <label>الأقل سعراً <input type="radio" name="price_filters" value="low_prices" {{$filters['price_filters'] == 'low_prices' ? "checked" : ""}}/></label>
                                            </a>
                                    </li>

                                </ul>
                                <div class="filter_salary">
                                    <input type="text" class="form-control" name="price_range_start" value="{{$filters['price_range_start']??10}}">
                                    <span>إلى</span>
                                    <input type="text" class="form-control" name="price_range_end" value="{{$filters['price_range_end']??2000}}">
                                    <button type="submit" class="btn search_sa">بحث</button>
                                </div>
                            </div>
                        </div>
                        <div class="filter_group">
                            <div class="fig_head clearfix">
                                <h3>المنتجات</h3>
                                <button class="toggle_filter"><i class="fal fa-angle-down"></i></button>
                            </div>
                            <div class="fig_body">
                                <ul>
                                    @foreach ($product_types as $type)
                                    <li>
                                        <label class="CField">
                                        <input type="checkbox" value="{{$type->id}}" name="product_type[]" {{in_array($type->id,$filters['product_type']) ? "checked" : ""}}>
                                            <label>{{$type->name}}</label>
                                        </label>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="filter_group">
                            <div class="fig_head clearfix">
                                <h3>تقييمات الزبائن</h3>
                                <button class="toggle_filter"><i class="fal fa-angle-down"></i></button>
                            </div>
                            <div class="fig_body">
                                <ul>
                                    <li>
                                        <div class="Rfield">
                                            <input type="radio" name="product_evaluation" value="5">
                                            <label>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="Rfield">
                                            <input type="radio" name="product_evaluation" value="4">
                                            <label>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fal fa-star"></i>
                                        </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="Rfield">
                                            <input type="radio" name="product_evaluation" value="3">
                                            <label>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fal fa-star"></i>
                                            <i class="fal fa-star"></i>
                                        </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="Rfield">
                                            <input type="radio" name="product_evaluation" value="2">
                                            <label>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fal fa-star"></i>
                                            <i class="fal fa-star"></i>
                                            <i class="fal fa-star"></i>
                                        </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="Rfield">
                                            <input type="radio" name="product_evaluation" value="1">
                                            <label>
                                            <i class="fas fa-star"></i>
                                            <i class="fal fa-star"></i>
                                            <i class="fal fa-star"></i>
                                            <i class="fal fa-star"></i>
                                            <i class="fal fa-star"></i>
                                        </label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="filter_group">
                            <div class="fig_head clearfix">
                                <h3>نوع الهدية</h3>
                                <button class="toggle_filter"><i class="fal fa-angle-down"></i></button>
                            </div>
                            <div class="fig_body">
                                <ul>
                                    @foreach ($gift_type as $item)
                                        <li>
                                            <div class="CField">
                                            <input type="checkbox" name="gift_type[]" value="{{$item->id}}" {{in_array($item->id,$filters['gift_type']) ? "checked" : ""}}>
                                            <label>{{$item->name}}</label>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="filter_group">
                            <div class="fig_head clearfix">
                                <h3>الشحن بواسطة</h3>
                                <button class="toggle_filter"><i class="fal fa-angle-down"></i></button>
                            </div>
                            <div class="fig_body">
                                <ul>
                                    @foreach ($shipping as $item)
                                        <li>
                                            <div class="CField">
                                            <input type="checkbox" name="shipping[]" value="{{$item->id}}" {{in_array($item->id,$filters['shipping']) ? "checked" : ""}}>
                                            <label>{{$item->name}}</label>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
            <div class="col-lg-9 col-md-8">
                <div class="filter_left_head clearfix">
                    <div class="fiter_select dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            تصنيف المشاريع
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">الأعلى مبيعا</a>
                            <a class="dropdown-item" href="#">الأعلى مبيعا</a>
                            <a class="dropdown-item" href="#">الأعلى مبيعا</a>
                            <a class="dropdown-item" href="#">الأعلى مبيعا</a>
                        </div>
                    </div>
                    <div class="filter_btns">
                        <div class="btn-group">
                            <a href="#" id="grid" class="btn btn-default btn-sm active">
                                <i class="fas fa-th-large"></i>
                            </a>
                            <a href="#" id="list" class="btn btn-default btn-sm">
                                <i class="far fa-list"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div id="filter_items" class="view_grid">
                    <div class="row">
                        @foreach ($products as $product)

                        <div class="item_pp col-lg-4 col-md-6">
                            <div class="project_item clearfix">
                                <div class="pro__thumb">
                                    <a href="{{route('product-details',[$product->id])}}">
                                        <img src="{{u($product->product_image)}}" alt="" class="img-responsive">
                                    </a>
                                    <div class="pro_cate">{{$product->type->name}}</div>
                                </div>
                                <div class="pro_caption">
                                    <h2><a href="{{route('product-details',[$product->id])}}">{{$product->name}}</a></h2>
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
                    {{$products->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
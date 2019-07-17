@extends('account')

@section('title', 'العنوانين')

@section('account-content')
<div class="profile_left_content">
    <h2 class="title_page">طلباتي<span>( مشاريع تبرعات) {{$orders->total()}}</span></h2>
    <div class="table-responsive">
        <table class="table table_order">
            <thead>
                <tr>
                    <th width="70%">الطلب</th>
                    <th>الحالة</th>
                    <th>فترة الانتظار</th>
                </tr>
            </thead>
        </table>
    </div>
    <div class="orders__list">
        @foreach ($orders as $item)

            <div class="order__item_block">
                <div class="oib_head">
                    <div class="row">
                        <div class="col-md-9">
                            <ul class="in_oib">
                            <li><span>رقم الطلب</span>{{$item->id}}</li>
                            <li><span>تاريخ الطلب</span>{{$item->created_at}}</li>
                            </ul>
                        </div>
                        <div class="col-md-3">
                        <div class="sa_oib">سعر الطلب<span>{{$item->total}}ر.س</span></div>
                        </div>
                    </div>
                </div>
                <div class="oib_body">
                    <div class="item_cart_block">
                        @foreach ($item->order_items as $order_item)
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="item_cr">
                                        <a href="{{route('product-details',[$order_item->product->id])}}" class="item_cr_thumb">
                                        <img src="{{u($order_item->product->product_image)}}" alt="" class="img-responsive">
                                        </a>
                                        <div class="item_cr_txt">
                                        <h2><a href="{{route('product-details',[$order_item->product->id])}}">{{$order_item->product->name}}</a></h2>
                                            <p>{{$order_item->product->description}}</p>
                                        </div>
                                    </div>
                                    @if ($loop->last)
                                    <div class="shipping_block clearfix">
                                        <h3>شركة الشحن</h3>
                                        <div class="select_shipping dropdown">
                                            <button type="button" class="btn btn-block dropdown-toggle" data-toggle="dropdown">{{$order_item->product->shipping_company->name}}</button>
                                        </div>
                                    </div>
                                    @endif

                                </div>
                                <div class="col-lg-4">
                                @if ($loop->first)

                                    <div class="ii_lTop clearfix">
                                        <div class="remove_cr">
                                            <a href="#con_alert{{$item->id}}" data-toggle="modal"><i class="fal fa-trash-alt"></i> إزالة</a>
                                        </div>
                                    </div>
                                    @if($item->received !=1)
                                    <div class="ii_lBottom clearfix">
                                        <div class="iib_right">
                                            <p>20 - 10 يوم</p>
                                        </div>
                                        <div class="iib_left">
                                            <a href="#" class="btn btn-block btn_st5">متابعة الطلب</a>
                                            <a href="{{route('Orders.received',$item->id)}}" class="btn btn-block btn_st5">تأكيد الاستلام</a>
                                        </div>
                                    </div>
                                    @endif
                                @endif

                                        @if($item->received == 1)
                                    <div class="ii_lBottom clearfix">
                                        <div class="iib_right">
                                            <p>20 - 10 يوم</p>
                                        </div>
                                        <div class="iib_left">
                                            <a href="{{route('Ratings.create',['id'=>$order_item->product_id,'order_id'=>$item->id])}}" class="btn btn-block btn_st5">تقييم</a>
                                            {{ratings($order_item->product->ratings()->where('user_id',auth()->user()->id)->value('value'))}}

                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="modal fade modal_confirm_alert modal_st1" id="con_alert{{$item->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-body confirm_body">
                          <h5>حذف العنوان</h5>
                          <p>هل أنت تريد حذف العنوان؟ة</p>
                          <div class="row">
                              <div class="col">
                                  <a href="{{route('Orders.delete',$item->id)}}" class="btn btn-block btn_submit_modal">نعم</a>
                              </div>
                              <div class="col">
                                  <button type="button" class="btn btn-block btn_empty" data-dismiss="modal">لا</button>
                              </div>
                          </div>
                        </div>

                      </div>
                    </div>
                  </div>

        @endforeach
    </div>
    {{ $orders->links() }}

</div>
@endsection

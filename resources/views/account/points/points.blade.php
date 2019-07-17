@extends('account')

@section('title', 'العنوانين')

@section('account-content')
<div class="profile_left_content">
    <h2 class="plc_title">نقاطي</h2>
    <div class="point_pHead">
        <div class="clearfix">
            <a href="{{route("Points/Programs")}}" class="more_infoPoint">معرفة المزيد عن برنامج نقاطي</a>
        </div>
        <div class="balance_point_box clearfix">
            <h3>رصيد نقاطك الحالي:<span>{{$pointCount}} نقطة</span></h3>
        <a href="{{route("Points/Redeem")}}" class="btn_replace btn_orange">استبدال النقاط</a>
        </div>
    </div>
    <div class="pBow_white">
        <ul class="nav nav-tabs tab_point_st" id="Tab_point" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="point1-tab" data-toggle="tab" href="#point1" role="tab" aria-controls="point1" aria-selected="true">النقاط</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="point2-tab" data-toggle="tab" href="#point2" role="tab" aria-controls="point2" aria-selected="false">بطاقة مجانية</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="point2-tab" data-toggle="tab" href="#point3" role="tab" aria-controls="point3" aria-selected="false">كوبون خصم</a>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="point1" role="tabpanel" aria-labelledby="point1-tab">
              @foreach ($points as $point)
                <div class="row_pp">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="rr_pp_right clearfix">
                                <div class="rrpp_thumb">
                                <img src="{{u($point->product->product_image)}}" alt="" class="img-responsive">
                                </div>
                                <div class="rrpp_txt">
                                <h2> {{$point->product->name}}</h2>
                                    <p>لقد حصلت على نقاط جديدة</p>
                                    <ul class="clearfix">
                                    <li>تاريخ : {{d($point->created_at)}}</li>
                                        <li>الساعة {{t($point->created_at)}}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="rr_pp_left">
                                <h3>النقاط المحصلة</h3>
                                <p>{{$point->amount}} نقاط</p>
                            </div>
                        </div>
                    </div>
                </div>
                  @endforeach       
                  {{$points->links()}}
                </ul>
          </div>
          <div class="tab-pane fade" id="point2" role="tabpanel" aria-labelledby="point2-tab">
                  <div class="row_pp">
                        @foreach ($free_cards as $voucher)
                        <div class="row">
                          <div class="col-lg-8">
                              <div class="rr_pp_right clearfix">
                                  <div class="rrpp_thumb">
                                      <img src="{{u($voucher->voucher->voucher_image)}}" alt="" class="img-responsive">
                                  </div>
                                  <div class="rrpp_txt">
                                      <h2>بطاقة شراء مجانية</h2>
                                      <p>{{$voucher->voucher->voucher_details}}</p>
                                      <p>حالة البطاقة : فعالة</p>
                                      <ul class="clearfix">
                                          <li>تاريخ : 
                                                {{ d($voucher->created_at) }}
                                          </li>
                                                {{ t($voucher->created_at) }}
                                                <li>الساعة 20:51</li>
                                      </ul>
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-4">
                              <div class="rr_pp_left">
                                  <button data-toggle="modal" data-target="#modal_cart" class="btn_point_use btn_orange">احصل على البطاقة</button>
                              </div>
                          </div>
                      </div>
                      @endforeach
                  </div>
                  {{$free_cards->links()}}
          </div>
          <div class="tab-pane fade" id="point3" role="tabpanel" aria-labelledby="point3-tab">
                <div class="row_pp">
                        @foreach ($coupons as $voucher)
                        <div class="row">
                          <div class="col-lg-8">
                              <div class="rr_pp_right clearfix">
                                  <div class="rrpp_thumb">
                                      <img src="{{u($voucher->voucher->voucher_image)}}" alt="" class="img-responsive">
                                  </div>
                                  <div class="rrpp_txt">
                                      <h2>بطاقة شراء مجانية</h2>
                                      <p>{{$voucher->voucher->voucher_details}}</p>
                                      <p>حالة البطاقة : فعالة</p>
                                      <ul class="clearfix">
                                          <li>تاريخ : 
                                                {{ d($voucher->created_at) }}
                                          </li>
                                                {{ t($voucher->created_at) }}
                                                <li>الساعة 20:51</li>
                                      </ul>
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-4">
                              <div class="rr_pp_left">
                                    <button  data-toggle="modal" data-target="#modal_discount" class="btn_point_use btn_orange">نسخ كود الكوبون</button>
                                </div>
                          </div>
                      </div>
                      @endforeach
                  </div>
                  {{$coupons->links()}}
          </div>
        </div>
    </div>
</div>
@endsection
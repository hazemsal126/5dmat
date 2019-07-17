@extends('account')

@section('title', 'العنوانين')

@section('account-content')
<div class="profile_left_content">
    <h2 class="plc_title">استبدال النقاط</h2>
    <div class="point_pHead">
        <div class="clearfix">
            <a href="#" class="more_infoPoint">معرفة المزيد عن برنامج نقاطي</a>
        </div>
        <div class="balance_point_box clearfix">
            <h3>رصيد نقاطك الحالي:<span>{{$amount}} نقطة</span></h3>
            <a href="#" class="btn_replace btn_orange">استبدال النقاط</a>
        </div>
    </div>
    <div class="pBow_white">
        <div class="product_change_list">
            <div class="row">
                @foreach ($vouchers as $voucher)
                        
                    <div class="col-lg-4 col-md-6">
                            <div class="proChange_item">
                                <div class="pC_thumb">
                                    <a href="#">
                                        <img src="{{u($voucher->voucher_image)}}" alt="" class="img-responsive">
                                    </a>
                                </div>
                                <div class="pC_txt">
                                    <h3>{{$voucher->voucher_details}}</h3>
                                    <h4>{{$voucher->point_count}} نقطة</h4>
                                <a href="{{route('Points/RedeemVoucher',$voucher->id)}}" class="btn_zeet">استبدال</a>
                                </div>
                            </div>
                        </div>
                @endforeach
            </div>
            {{$vouchers->links()}}
        </div>
    </div>
</div>
@endsection
@extends('app')

@section('title', 'العنوانين')
@section('scripts')
    <script>
        $(function() {
        // Handler for .ready() called.
            $(".adrs_block_item").click((e)=>{
                $.ajax({
                    url: '{{route("SET_ADDRESS")}}',
                    type: 'post',
                    data: {
                        address: $(this).find('input[type="radio"]').prop('value')
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType: 'json',
                    success: function (data) {
                        if(data.status)
                            $(".btn.btn_nn1").prop("type","submit");
                    }
                });
                // console.log()
                // alert($(this).find('input[type="radio"]').val());
            });
        });
    </script>
@endsection
@section('content')

<div class="payment__page skin_page">
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
                        <div class="wiz-block active">
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
            <h2>عنوان الشحن</h2>
            <form action="{{route('paymentinformation')}}" method="get">
            <div class="address_select_list">
                <div class="row">
                    @foreach ($addresses as $address)
                        <div class="col-lg-4 col-md-6">
                            <label>
                            <div class="adrs_block_item">
                            <input type="radio" name="address_id" class="radio_st" value="{{$address->id}}">
                                <div class="aimgcheck_adrs" for="radio_cup1">
                                    <ul>
                                    <li><span>الاسم</span>{{$address->firstName}} {{$address->lastName}}</li>
                                        <li><span>العنوان</span>{{$address->street}} - {{$address->address}} {{$address->city->name}}- {{$address->country->name}}</li>
                                    <li><span>رقم الموبايل</span>{{$address->mobileNumber}}</li>
                                    </ul>
                                    <div class="adrs_dots">
                                    <img src="{{theme_assets('images/sd.svg')}}" alt="">
                                    </div>
                                </div>
                            </div>
                            </label>
                        </div>
                    @endforeach
                    <div class="col-lg-4 col-md-6">
                        <div class="adrs_block_item add_adrs_new">
                            <a href="{{route('Addresses.create')}}"><span>استخدم عنوان جديد +</span> </a>
                        </div>
                    </div>
                </div>
                <button type="button" href="{{route('paymentinformation')}}" class="btn btn_nn1">المتابعة</a>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection

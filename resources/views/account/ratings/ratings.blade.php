@extends('account')

@section('title', 'العنوانين')

@section('account-content')
<div class="profile_left_content">
    <h2 class="plc_title">التقييم</h2>
    <div class="evaluate_list_block">
        @foreach ($ratings as $item)
            <div class="eva_box">
                <div class="eva_box_re">
                    <div class="eva_proRight clearfix">
                        <a href="#" class="eva_thumb">
                            <img src="{{theme_assets("images/eve.png")}}" alt="" class="img-responsive">
                        </a>
                        <div class="eva_txt">
                        <h2><a href="#">{{$item->product->name}}</a></h2>
                            <p>{{$item->message}}</p>
                            <ul class="eva_meta clearfix">
                            <li>تاريخ الطلب : {{d($item->order->created_at)}}</li>
                            <li>الساعة {{t($item->order->created_at)}}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="eva_state">
                        <h3>التقييم</h3>
                        <div class="x-star-rating">
                            {{ratings($item->value)}}
                            {{-- <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span> --}}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{$ratings->links()}}
</div>
@endsection

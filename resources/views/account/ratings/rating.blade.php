@extends('account')

@section('title', 'العنوانين')

@section('account-content')
<div class="profile_left_content">
    <h2 class="plc_title">التقييم</h2>
    <div class="white_box_st1">
        <div class="evalaute_product">
            <h2>{{$product->name}}</h2>
            <p>{{$product->description}}</p>
            <div class="row">
                <div class="col-lg-7">
                    <form class="form_evalaute" action="{{route('Ratings.store',['id'=>$id,'order_id'=>$order_id])}}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label>التقييم</label>
                            </div>
                            <div class="col-md-9">
                                <fieldset class="rating">
                                    <input type="radio" id="star5" name="rating" value="5"><label class="full" for="star5"></label>
                                    <input type="radio" id="star4" name="rating" value="4"><label class="full" for="star4"></label>
                                    <input type="radio" id="star3" name="rating" value="3"><label class="full" for="star3"></label>
                                    <input type="radio" id="star2" name="rating" value="2"><label class="full" for="star2"></label>
                                    <input type="radio" id="star1" name="rating" value="1"><label class="full" for="star1"></label>
                                </fieldset>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label>التعليقات</label>
                            </div>
                            <div class="col-md-9">
                                <textarea class="form-control" name="message" placeholder="اكتب تعليقك هنا"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-6">
                                        <button type="submit" class="btn btn-block btn_nn1">موافق</button>
                                    </div>
                                    <div class="col-6">
                                        <button type="button" class="btn btn-block btn_empty">الغاء</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('account')

@section('title', 'العنوانين')

@section('account-content')
<div class="profile_left_content">
    <h2 class="plc_title">العناوين</h2>
    <div class="address__head clearfix">
        <h3>إضافة وإزالة وتحديد العناوين المفضلة</h3>
    <a href="{{route('Addresses.create')}}" class="btn btn_nn1 btn_left">إضافة عنوان جديد</a>
    </div>
    <div class="pr_box_con">
        <div class="pr_box_head">
            <h3>العنوان الرئيسي</h3>
        </div>
        <div class="pr_box_body">
            <div class="edit_info">
                @foreach ($MainAddress as $address)
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <label>الاسم</label>
                                <p>{{$address->firstName .' '.$address->lastName}}</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <label>العنوان</label>
                                <p>{{$address->address}}</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <label>رقم الجوال</label>
                                <p>{{$address->mobileNumber}}</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="address_btns_action">
                                <a href="{{route('Addresses.edit',$address->id)}}" class="btn btn-block btn_st4">تعديل</a>
                                <a href="{{route('DeleteAddresses',$address->id)}}" class="btn btn-block btn_st5">حذف</a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <div class="pr_box_con">
        <div class="pr_box_head">
            <h3>العناوين الأخرى</h3>
        </div>
        <div class="pr_box_body">
            <div class="edit_info">
                @foreach ($Addresses as $address)
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="form-group">
                            <label>الاسم</label>
                            <p>{{$address->firstName .' '.$address->lastName}}</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="form-group">
                            <label>العنوان</label>
                            <p>{{$address->address}}</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="form-group">
                            <label>رقم الجوال</label>
                            <p>{{$address->mobileNumber}}</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="address_btns_action">
                            <a href="{{route('MarkAsDefault',$address->id)}}" class="btn btn-block btn_st4">تعيين كعنوان افتراضي</a>
                            <a href="{{route('Addresses.edit',$address->id)}}" class="btn btn-block btn_st5">تعديل</a>
                            <a href="{{route('DeleteAddresses',$address->id)}}" class="btn btn-block btn_st5">حذف</a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
<div class="modal fade modal_confirm_alert modal_st1" id="con_alert" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-body confirm_body">
              <h5>حذف العنوان</h5>
              <p>هل أنت تريد حذف العنوان؟</p>
              <div class="row">
                  <div class="col">
                      <button type="button" class="btn btn-block btn_submit_modal">نعم</button>
                  </div>
                  <div class="col">
                      <button type="button" class="btn btn-block btn_empty" data-dismiss="modal">لا</button>
                  </div>
              </div>
            </div>
          
          </div>
        </div>
      </div>
@endsection

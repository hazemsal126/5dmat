@extends('siteinfo.siteinfo')

@section('title', 'العنوانين')

@section('siteinfo-content')
<div class="contact_page">
    <h2>تواصل معنا</h2>
    <div class="welcome_contact">
        <h2>مرحباً بك في أي وقت :)</h2>
        <div class="row">
            <div class="col-md-6 borleft">
                <div class="we_item clearfix">
                <img src="{{theme_assets("images/Send.png")}}" alt="" class="img-responsive">
                    <div class="we_ctt">
                        <h3>البريد الالكتروني :</h3>
                        <p>hello@gmail.com </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 clearfix">
                <div class="we_item we_item_left clearfix">
                    <img src="{{theme_assets("images/mobile-phone.png")}}" alt="" class="img-responsive">
                    <div class="we_ctt">
                        <h3>هاتف :</h3>
                        <p>+970-959-999-999</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form class="form_contact" action="#">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>الاسم</label>
                    <input type="text" class="form-control" placeholder="الاسم">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>الايميل</label>
                    <input type="email" class="form-control" placeholder="الايميل">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>عنوان الرسالة</label>
                    <input type="text" class="form-control" placeholder="عنوان الرسالة">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>نص الرسالة</label>
                    <textarea class="form-control" placeholder="نص الرسالة"></textarea>
                </div>
            </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-md-4">
                <button type="submit" class="btn btn-block btn_contact">إرسال</button>
            </div>
        </div>
    </form>
</div>
@endsection
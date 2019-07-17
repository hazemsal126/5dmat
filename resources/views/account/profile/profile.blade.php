@extends('account')

@section('title', 'العنوانين')

@section('account-content')
<div class="profile_left_content">
    <h2 class="plc_title">الملف الشخصي</h2>
    <div class="pr_box_con">
        <div class="pr_box_head">
            <h3>المعلومات الأساسية</h3>
        </div>
        <div class="pr_box_body">
            <div class="edit_info">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>الاسم الأول</label>
                            <input type="text" class="form-control" value="الاسم الأول">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>اسم العائلة</label>
                            <input type="text" class="form-control" value="اسم العائلة">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>رقم الجوال</label>
                            <input type="text" class="form-control" value="رقم الجوال">
                        </div>
                    </div>
                </div>
                <div class="clearfix">
                    <button type="submit" class="btn btn_nn1 btn_left">حفظ</button>
                </div>
            </div>
        </div>
    </div>
    <div class="pr_box_con">
        <div class="pr_box_head">
            <h3>معلومات الأمن</h3>
        </div>
        <div class="pr_box_body">
            <div class="edit_info">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>البريد الإلكتروني</label>
                            <input type="email" class="form-control" value="البريد الإلكتروني">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>كلمة المرور</label>
                            <div class="change_pass">
                                <input type="password" class="form-control" value="المرور">
                                <button type="button" class="btn btn_nn1 btn_nn1_xs" data-toggle="modal" data-target="#modal_pass">تغيير</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
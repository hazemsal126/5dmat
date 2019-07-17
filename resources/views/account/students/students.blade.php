@extends('account')

@section('title', 'العنوانين')

@section('account-content')
<div class="profile_left_content">
    <div class="student_head_block">
        <div class="row justify-content-md-center">
            <div class="col-lg-10">
                <div class="stu_hContent">
                    <h2>استعلام عن أخبار الحلقات</h2>
                    <p>يمكنك متابعة أخبار الحلقات والطلاب الذين قمت بالتبرع لهم و معرفة أخر أخبارهم </p>
                    <h3>( ملاحظة يرجى ادخال رقم الطلب الخاص بالحلقة )</h3>
                    <form class="form_student" action="#">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="ادخل رقم الطلب لمعرفة أخبار الحلقة">
                            <button type="submit" class="btn btn_sty">بحث</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="student_file_list">
        <div class="row">
            @foreach ($Products as $item)
                <div class="col-lg-4 col-md-6">
                    <div class="student_file_box">
                    <a href="{{route('Students.show',[$item->id])}}" class="stu_thumb">
                        <img src="{{u($item->product_image)}}" alt="" class="img-responsive">
                        </a>
                        <div class="stu_txt">
                        <h2><a href="{{route('Students.show',[$item->id])}}">{{$item->name}}</a></h2>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row justify-content-md-center">
            {{$Products->links()}}
        </div>
    </div>
</div>
@endsection
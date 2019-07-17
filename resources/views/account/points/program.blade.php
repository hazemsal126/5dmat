@extends('account')

@section('title', 'العنوانين')

@section('account-content')
<div class="profile_left_content">
    <div class="ads_banner">
        <a href="#"><img src="{{theme_assets("images/ads.png")}}" alt="" class="img-responsive"></a>
    </div>
    <div class="point_block_rg">
        <h2>برنامج نقاطي</h2>
        <p>تبرع و اكسب النقاط للحصول على خصومات على متاجر عالمية و منتجات متنوعة</p>
        <div class="pob_d">
            <h3>عن البرنامج:</h3>
            <p>نقاط أكثر  .  .  .   هدايا أكثر
            <br><br>
            تستطيع  من خلال  برنامج نقاطي تجميع النقاط عند كل عملية تبرع أو اهداء و تستطيع الحصول الخصومات أو بطاقات شراء أو كوبونات شراء مجانية من المتاجر الالكترونية مثل نون دوت كوم أو سوق دوت كوم وهدايا أخرى قيمة يتم تحديثها دائماً . ويوجد لدينا في كل فرع مكتب خدمة عملاء مخصص لهذا الغرض ولتوفير الكروت مجانا إلى عملائنا الدائمين وأيضاً لتقديم أي معلومات بهذا الشأن</p>
        </div>
        <div class="pob_d">
            <h3>مميزات البرنامج:</h3>
            <ul>
                <li>نقاط مقابل كل 10 تبرع</li>
                <li>عروض على منتجات محددة للحصول على نقاط إضافية</li>
                <li>بطاقات مجانية للأعضاء الجدد</li>
                <li>إمكانية توفير بطاقة إضافية بمقابل مادى</li>
                <li>يمكنك معرفة رصيد النقاط الخاصة بك من خلال صفحة نقاطي على متجرنا الإلكترونى أو تطبيق الجوال الخاص بنا</li>
            </ul>
        </div>
    </div>
    <div class="point_block_rg">
        <h2>خطوات البدأ</h2>
        <div class="step_point_list">
            <div class="step_p_item clearfix">
                <div class="stp_icon stp_icon_co1">
                    <img src="{{theme_assets("images/account.svg")}}" alt="" class="img-responsive">
                </div>
                <div class="stp_txt">
                    <h3>انشاء حساب</h3>
                    <p>أن نحقق رؤيتنا في الاحترافية في الأداء من خلال الانتشار والوصول الى جميع المتبرعين، وتوفير التبرعات للمحتاجين</p>
                </div>
            </div>
            <div class="step_p_item clearfix">
                <div class="stp_icon stp_icon_co2">
                    <img src="{{theme_assets("images/payment-method.svg")}}" alt="" class="img-responsive">
                </div>
                <div class="stp_txt">
                    <h3>تبرع واكسب النقاط</h3>
                    <p>عند قيامك بالتبرع أو بهداء هدية تحصل على نقاط و خصومات </p>
                </div>
            </div>
            <div class="step_p_item clearfix">
                <div class="stp_icon stp_icon_co3">
                    <img src="{{theme_assets("images/gift.svg")}}" alt="" class="img-responsive">
                </div>
                <div class="stp_txt">
                    <h3>استبدل النقاط بالهدايا والخصومات</h3>
                    <p>أن نحقق رؤيتنا في الاحترافية في الأداء من خلال الانتشار والوصول الى جميع المتبرعين، وتوفير التبرعات للمحتاجين</p>
                </div>
            </div>
        </div>
        <a href="#" class="scribe_step btn_orange">اشترك الأن</a>
    </div>
</div>
@endsection
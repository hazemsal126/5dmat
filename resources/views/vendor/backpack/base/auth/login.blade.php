
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>خيركم</title>
    <!-- Stylesheets -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('front/css/animate.min.css')}}">
    <link href="{{asset('front/css/fontawesome-all.css')}}" rel="stylesheet">
    <link href="{{asset('front/css/material-design-iconic-font.css')}}" rel="stylesheet">
    <link href="{{asset('front/css/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('front/css/owl.theme.default.min.css')}}" rel="stylesheet">
    <link href="{{asset('front/css/style.css')}}" rel="stylesheet">
    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link href="{{asset('front/css/responsive.css')}}" rel="stylesheet">
    <!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <!--[if lt IE 9]><script src="{{asset('front/js/respond.js')}}"></script><![endif]-->
    <script src="{{asset('front/js/jquery-1.12.2.min.js')}}"></script>
</head>
<body>
<div class="main-wrapper">
    <div class="pages_register">
        <div class="header_lang">
            <div class="container clearfix">
                <div class="lang_site_r">
                    <a href="#">English</a>
                </div>
            </div>
        </div>
        <div class="page_register_content">
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-lg-5 col-md-7">
                        <div class="logo_site_center">
                            <a href="#"><img src="{{asset('front/images/logo.png')}}" alt="" class="img-responsive"></a>
                        </div>
                        <h2 class="title_reg">تسجيل الدخول</h2>
                        <form class="form_st1" role="form" method="POST" action="{{ route('backpack.auth.login') }}">
                            {!! csrf_field() !!}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group{{ $errors->has($username) ? ' has-error' : '' }}">
                                        <label class="control-label">{{ config('backpack.base.authentication_column_name') }}</label>
                                        <input type="text" class="form-control" name="{{ $username }}" value="{{ old($username) }}">
                                        @if ($errors->has($username))
                                            <span class="help-block" style="color: red">
                                        <strong>{{ $errors->first($username) }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label class="control-label">{{ trans('backpack::base.password') }}</label>
                                        <div class="input_password">
                                            <input type="password" name="password" id="pwd" class="form-control">
                                            <span class="show_pass" onclick="show()" id="EYE"><i class="fal fa-eye"></i>
                                                @if ($errors->has('password'))
                                                    <strong class="help-block">{{ $errors->first('password') }}</strong>
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                    <div class="forget_pass clearfix">
                                        <a href="{{ route('backpack.auth.password.reset') }}">هل نسيت كلمة المرور؟</a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-block btn_orange">تسجيل الدخول</button>
                                </div>
                            </div>
                        </form>
                        {{--<div class="reg_bottom">--}}
                            {{--<h3>لا تمتلك حساب ؟ <a href="#">يمكن التسجيل هنا</a></h3>--}}
                        {{--</div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!--main-wrapper-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="{{asset('front/js/owl.carousel.min.js')}}" type="text/javascript"></script>
<script src="{{asset('front/js/script.js')}}"></script>
<script type="text/javascript">
    function show() {
        var a=document.getElementById("pwd");
        var b=document.getElementById("EYE");
        if (a.type=="password")  {
            a.type="text";
        }
        else {
            a.type="password";
        }
    }
</script>
</body>
</html>
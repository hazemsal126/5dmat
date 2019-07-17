@extends('account')

@section('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endsection
@section('title', 'العنوانين')

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script type='text/javascript' src='https://www.bing.com/api/maps/mapcontrol?callback=GetMap&setMkt=en-US&setLang=en&key=AjQ5Z3H5qH0tPqW7Hkbb0mFWPjmiXlhK5kC6ThaA9xYBf_duNLPfhqRTY5j46cVV ' async defer></script>
<script>
    var map;
    function GetMap() {
        map = new Microsoft.Maps.Map(document.getElementById('myMap'), {});
        map.setView({
        center: new Microsoft.Maps.Location({{explode(',',$address->geolocation)[0]}}, {{explode(',',$address->geolocation)[1]}}),
        zoom: 15
    });
    }

    jQuery(document).ready(function( $ ) {
      $('select[name="country"]').select2();
      $('select[name="state"]').select2();
      $('select[name="city"]').select2();
      $('#mapseach').submit(function(e) {
          e.preventDefault();
        Microsoft.Maps.loadModule('Microsoft.Maps.Search', function () {
            var searchManager = new Microsoft.Maps.Search.SearchManager(map);
            var requestOptions = {
                bounds: map.getBounds(),
                where: $("#address-text").val(),
                callback: function (answer, userData) {
                    console.log(answer.results[0]);
                    geo = answer.results[0].location.latitude+","+answer.results[0].location.longitude;
                    $("[name='address']").val(answer.results[0].address.formattedAddress);
                    $("[name='geolocation']").val(geo);
                    map.setView({ bounds: answer.results[0].bestView });
                    map.entities.push(new Microsoft.Maps.Pushpin(answer.results[0].location));
                }
            };
            searchManager.geocode(requestOptions);
        });
    });

        $('select[name="country"]').change(function(e) {
            var parent = e.target.value;
            $('select[name="state"]').empty();
			$('select[name="city"]').empty();
            $.get('{{route("GET_STATES")}}/' + parent, function(data) {
                $('select[name="state"]').empty();
                $.each(data, function(key, value) {
                    var option = $("<option></option>")
                          .attr("value", key)		                  
                          .text(value);
    
                    $('select[name="state"]').append(option);
                });
            });
        });
        $('select[name="state"]').change(function(e) {
            var parent = e.target.value;
            $.get('{{route("GET_CITIES")}}/' + parent, function(data) {
                $('select[name="city"]').empty();
                $.each(data, function(key, value) {
                    var option = $("<option></option>")
                        .attr("value", key)		                  
                        .text(value);

                    $('select[name="city"]').append(option);
                });
            });
        });
	});
</script>
@endsection
@section('account-content')
<div class="profile_left_content">
    <h2 class="plc_title">تعديل العنوان</h2>
    <div class="white_box_st1 border0">
        <div class="address_whblock">
            <div class="row">
                <div class="col-lg-7">
                    <h3>يرجى إضافة في عنوان الشحن الخاص بك</h3>
                    <form class="form_st2" method="POST" action="{{route('Addresses.update',[$address->id])}}">
                            @method('PUT')
                            @csrf
                            @if($errors->count())
                            <div class="clearfix">
                                    <div class="alert alert-danger" role="alert">
    
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                </div>
                            </div>
                            @endif
    
                        <div class="row">
                            <div class="col-md-3">
                                <label>الاسم الاول</label>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                {{-- {!! Form::text('firstName', Input::old('firstName'), array('placeholder' => 'First name', 'class' => 'form-control')) !!} --}}
                                <input type="text" name="firstName" value="{{old('firstName') ?? $address->firstName}}" class="form-control"/>
                                    </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label>اسم العائلة</label>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                        <input type="text" name="lastName" value="{{old('lastName') ?? $address->lastName}}" class="form-control">
                                    </div>
                            </div>
                        </div>
                        <div class="row">
                                <div class="col-md-3">
                                    <label>الدولة</label>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        {{Form::select('country',$countries,$address->country_id,["class"=>'form-control','placeholder' => 'Select a country'])}}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label>الولاية</label>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        {{Form::select('state',$states,$address->state_id,["class"=>'form-control','placeholder' => 'Select a state'])}}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label>المدينة</label>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        {{Form::select('city',$cities,$address->city_id,["class"=>'form-control','placeholder' => 'Select a city'])}}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label>العنوان</label>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" name="address" value="{{old('address') ?? $address->address}}" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label>الاحداثيات</label>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" name="geolocation" value="{{old('geolocation') ?? $address->geolocation}}" class="form-control">
                                    </div>
                                </div>
                            </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label>رقم الجوال</label>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <input type="text" name="mobile" value="{{old('mobile') ?? $address->mobileNumber}}"  class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-6">
                                        <button type="submit" class="btn btn-block btn_nn1 hie40">حفظ العنوان</button>
                                    </div>
                                    <div class="col-6">
                                            <a type="button" class="btn btn-block btn_empty hie40" href="{{route('Addresses.index')}}">إلغاء</a>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-5">
                        <h3>تحديد الموقع</h3>
                        <div class="map_location">
                            <div id="myMap" style='position:relative;width:300px;height:300px;'></div>
                            <div class="search_address">
                                <form action="#" id="mapseach">
                                    <input type="text" class="form-control" id="address-text" placeholder="ابحث عن موقعك ...">
                                    <button type="submit" class="btn_search_adr"><i class="fal fa-search"></i></button>
                                </form>
                            </div>
    
                        </div>
                        <button type="button" class="btn btn_bb bb_table">حفظ العنوان</button>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
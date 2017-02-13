@extends('layouts_frontend.master_frontend')
@section('title','Abstract Form')
@section('content')

    <div class="col-md-9 right">
        {!! generateSlider() !!}
        {{--<!-- Carousel & header section -->--}}
        {{--<div class="slider-header">--}}
            {{--18th IMS conference 23rd AFIM Meeting--}}
        {{--</div>--}}

        {{--<!-- Carousel Slider Part -->--}}
        {{--<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">--}}
            {{--<!-- Indicators -->--}}
            {{--<ol class="carousel-indicators">--}}
                {{--<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>--}}
                {{--<li data-target="#carousel-example-generic" data-slide-to="1"></li>--}}
            {{--</ol>--}}

            {{--<!-- Wrapper for slides -->--}}
            {{--<div class="carousel-inner" role="listbox">--}}
                {{--<div class="item active">--}}
                    {{--<img src="/images/slider1.png" alt="">--}}
                    {{--<div class="carousel-caption">--}}
                        {{--Caption 1--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="item">--}}
                    {{--<img src="/images/slider2.png" alt="">--}}
                    {{--<div class="carousel-caption">--}}
                        {{--Caption 2--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}

            {{--<!-- Controls -->--}}
            {{--<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">--}}
                {{--<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>--}}
                {{--<span class="sr-only">Previous</span>--}}
            {{--</a>--}}
            {{--<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">--}}
                {{--<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>--}}
                {{--<span class="sr-only">Next</span>--}}
            {{--</a>--}}
        {{--</div>--}}
        {{--<!-- end of Carousel & header section -->--}}
        <br>

    <h2 class="">{{'Abstractform Entry' }}</h2>

    {!! Form::open(array('id'=> 'frm_abstract' , 'url' => 'abstractform/store', 'class'=> 'form-horizontal user-form-border', 'files'=> 'true')) !!}
    <br>
    <div class="row entry_row">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <label for="first_name">First Name<span class="require">*</span></label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name" value="{{Request::old('first_name') }}"/>
            <p class="text-danger" id="first_name_error">{{$errors->first('first_name')}}</p>
        </div>
    </div>

    <div class="row entry_row">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <label for="middle_name">Middle Name</label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <input type="text" class="form-control" id="middle_name" name="middle_name" placeholder="Enter Middle Name" value="{{Request::old('middle_name') }}"/>
            <p class="text-danger">{{$errors->first('middle_name')}}</p>
        </div>
    </div>

    <div class="row entry_row">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <label for="last_name">Last Name<span class="require">*</span></label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name" value="{{Request::old('last_name') }}"/>
            <p class="text-danger" id="last_name_error">{{$errors->first('last_name')}}</p>
        </div>
    </div>

    <div class="row entry_row">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <label for="email">Email</label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" value="{{Request::old('email') }}"/>
            <p class="text-danger" id="email_error">{{$errors->first('email')}}</p>
        </div>
    </div>

    <div class="row entry_row">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <label for="country">Country</label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <select class="form-control" name="country" id="country">                   
                <option value="" selected disabled>Select Country</option>
                    @foreach($countries as $key=>$value)
                <option value="{{$key}}">{{$value}}</option>
                    @endforeach
            </select>
            <p class="text-danger" id="country_error">{{$errors->first('country')}}</p>
        </div>
    </div>

    {{--<div class="row entry_row">--}}
        {{--<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">--}}
            {{--<label for="medical_specialities">Medication Specialities</label>--}}
        {{--</div>--}}
        {{--<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">--}}
            {{--<input type="text" class="form-control" id="medical_specialities" name="medical_specialities" placeholder="Enter Medical Specialities" value="{{Request::old('medical_specialities') }}"/>--}}
            {{--<p class="text-danger" id="medical_specialities_error">{{$errors->first('medical_specialities')}}</p>--}}
        {{--</div>--}}
    {{--</div>--}}

    <div class="row entry_row">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <label for="medical_specialities">Medication Specialities<span class="require">*</span></label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <select class="form-control" name="medical_specialities" id="medical_specialities" onchange="check_for_other();">
                @foreach($specialitiesArr as $key=>$specialities)
                    @if($key == "main_speciality")
                        @foreach($specialities as $mainSpeciality)
                            <option value="{{$mainSpeciality->id}}">{{$mainSpeciality->name}}</option>
                        @endforeach
                    @else
                        <optgroup label="{{$key}}">
                            @foreach($specialities as $subSpeciality)
                                @if($subSpeciality->option_group_name == $key)
                                    <option value="{{$subSpeciality->id}}" style="margin-left:20px;">{{$subSpeciality->name}}</option>
                                @endif
                            @endforeach
                        </optgroup>
                    @endif
                @endforeach
                <option value="other">Other</option>
            </select>
            <p class="text-danger" id="medical_specialities_error">{{$errors->first('medical_specialities')}}</p>
        </div>
    </div>

    <div class="other row entry_row" style="display: none;">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <label for="other">Other Speciality<span class="require">*</span></label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <input type="text" class="form-control" id="other" name="other" placeholder="Enter Other Speciality Text" value="{{Request::old('other') }}"/>
            <p class="text-danger" id="other_error">{{$errors->first('other')}}</p>
        </div>
    </div>

    <div class="row entry_row">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <label for="abstract_file_path">File Upload</label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <input type="file" class="form-control" id="abstract_file_path" name="abstract_file_path" placeholder="Enter Abstract File Path" value=""/>
            <p class="text-danger" id="abstract_file_path_error">{{$errors->first('abstract_file_path')}}</p>
        </div>
    </div>

    <div class="row entry_row">
        {{--<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">--}}
        {{--</div>--}}
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 col-lg-offset-4 col-md-offset-4 col-sm-offset-4 col-xs-offset-4"  style="margin-right:10px;">
            {{--<button type="button" onclick="pre_add_confirm_setup();" class="form-control btn-primary button-type">--}}
                {{--SUBMIT--}}
            {{--</button>--}}
            <button type="button" class="form-control btn btn-primary" onclick="pre_add_confirm_setup();">SUBMIT</button>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            {{--<input type="button" value="CANCEL" class="form-control cancel_btn button-type" onclick="cancel_setup('abstractform')">--}}
            {{--<a href="/home/abstract"><button type="button" class="btn btn-primary cancel_btn" style="margin-top:0px;">CANCEL</button></a>--}}
            <a href="/home/abstract"><button type="button" class="form-control btn btn-primary cancel_btn frontend-cancel">CANCEL</button></a>
        </div>
    </div>
    {!! Form::close() !!}
</div>
@stop

@section('page_script')
    <script src="/assets/js/utils.js"></script>
    <script type="text/javascript">

        function pre_add_confirm_setup(){

            var valid = true;

            $("#first_name_error").text("");
            var first_name = $("#first_name").val();
            if(first_name == "" || first_name == "undefined"){
                $("#first_name_error").text("First Name is required !");
                valid = false;
            }

            $("#last_name_error").text("");
            var last_name = $("#last_name").val();
            if(last_name == "" || last_name == "undefined"){
                $("#last_name_error").text("Last Name is required !");
                valid = false;
            }

            $("#email_error").text("");
            var email = $("#email").val();
            if(email == "" || email == "undefined"){
                $("#email_error").text("Email is required !");
                valid = false;
            }
            else{
                var validEmail = ValidateEmail(email);
                if(validEmail == false){
                    $("#email_error").text("Email is Invalid !");
                    valid = false;
                }
            }

            $("#country_error").text("");
            var country = $("#country").val();
            if(country == "" || country == "undefined" || country == null){
                $("#country_error").text("Country is required !");
                valid = false;
            }

            $("#medical_specialities_error").text("");
            var medical_specialities = $("#medical_specialities").val();
            if(medical_specialities == "" || medical_specialities == "undefined"){
                $("#medical_specialities_error").text("Medical Specialities is required !");
                valid = false;
            }

            if ($('#abstract_file_path').get(0).files.length === 0) {
                $("#abstract_file_path_error").text("Abstract File is required !");
                valid = false;
            }

            if(valid == true){
                add_confirm_setup('abstract');
            }

        }

        function check_for_other(){
            var other_flag = document.getElementById('medical_specialities').value;
            if(other_flag == "other"){
                $(".other").show();
            }
            else{
                $(".other").hide();
            }
        }

    </script>
@stop
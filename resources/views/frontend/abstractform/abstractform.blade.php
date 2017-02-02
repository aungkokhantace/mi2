@extends('layouts_frontend.master_frontend')
@section('title','Test Page')
@section('content')

    <div class="col-md-9 page_content right">

    <h2 class="form-header">{{'Abstractform Entry' }}</h2>

    {!! Form::open(array('id'=> 'frm_abstract' , 'url' => 'abstractform/store', 'class'=> 'form-horizontal user-form-border', 'files'=> 'true')) !!}
    <br>
    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="first_name">First Name<span class="require">*</span></label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name" value="{{Request::old('first_name') }}"/>
            <p class="text-danger" id="first_name_error">{{$errors->first('first_name')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="middle_name">Middle Name</label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <input type="text" class="form-control" id="middle_name" name="middle_name" placeholder="Enter Middle Name" value="{{Request::old('middle_name') }}"/>
            <p class="text-danger">{{$errors->first('middle_name')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="last_name">Last Name<span class="require">*</span></label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name" value="{{Request::old('last_name') }}"/>
            <p class="text-danger" id="last_name_error">{{$errors->first('last_name')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="email">Email</label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" value="{{Request::old('email') }}"/>
            <p class="text-danger" id="email_error">{{$errors->first('email')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
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

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="medical_specialities">Medication Specialities</label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <input type="text" class="form-control" id="medical_specialities" name="medical_specialities" placeholder="Enter Medical Specialities" value="{{Request::old('medical_specialities') }}"/>
            <p class="text-danger" id="medical_specialities_error">{{$errors->first('medical_specialities')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="abstract_file_path">File Upload</label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <input type="file" class="form-control" id="abstract_file_path" name="abstract_file_path" placeholder="Enter Abstract File Path" value=""/>
            <p class="text-danger" id="abstract_file_path_error">{{$errors->first('abstract_file_path')}}</p>
        </div>
    </div>

    <div class="row">
        {{--<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">--}}
        {{--</div>--}}
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-2">
            <button type="button" onclick="pre_add_confirm_setup();" class="form-control btn-primary button-type">
                SUBMIT
            </button>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
            <input type="button" value="CANCEL" class="form-control cancel_btn button-type" onclick="cancel_setup('page')">
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

    </script>
@stop
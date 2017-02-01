@extends('layouts_frontend.master_frontend')
@section('title','Test Page')
@section('content')

    <div class="col-md-9 right">

    <h1 class="page-header">{{'Register Entry' }}</h1>

    {!! Form::open(array('id'=> 'frm_register' , 'url' => '/register/store', 'class'=> 'form-horizontal user-form-border')) !!}
    {{ csrf_field() }}
    <input type="hidden" name="events_id" value="1"/>
    <br/>

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
            <label for="last_name">Last Name<span class="require">*</label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name" value="{{Request::old('last_name') }}"/>
            <p class="text-danger" id="last_name_error">{{$errors->first('last_name')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="title">Title</label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" value="{{Request::old('title') }}"/>
            <p class="text-danger">{{$errors->first('title')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="email">Email<span class="require">*</label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email" value="{{Request::old('email') }}"/>
            <p class="text-danger" id="email_error">{{$errors->first('email')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="country">Country<span class="require">*</label>
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
            <label for="where_work">Where you work<span class="require">*</label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <input type="text" class="form-control" id="where_work" name="where_work" placeholder="Enter where you work" value="{{Request::old('where_work') }}"/>
            <p class="text-danger" id="where_work_error">{{$errors->first('where_work')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="medical_specialities">Medication Specialities<span class="require">*</label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <input type="text" class="form-control" id="medical_specialities" name="medical_specialities" placeholder="Enter Medication Specialities" value="{{Request::old('medical_specialities') }}"/>
            <p class="text-danger" id="medical_specialities_error">{{$errors->first('medical_specialities')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="phone_no">Phone no<span class="require">*</label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <input type="text" class="form-control" id="phone_no" name="phone_no" placeholder="Enter Phone no" value="{{Request::old('phone_no') }}"/>
            <p class="text-danger" id="phone_no_error">{{$errors->first('phone_no')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="registration_category">Registration Category<span class="require">*</label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <select class="form-control" name="registration_category" id="registration_category">
                <option value="" selected disabled>Select Registration Category</option>
                <option value="1">International Delegate</option>
                <option value="2">Local Delegate</option>
                <option value="3">Local Trainee</option>
            </select>
            <p class="text-danger" id="registration_category_error">{{$errors->first('registration_category')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="payment_type">Payment Type<span class="require">*</label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <select class="form-control" name="payment_type" id="payment_type">
                <option value="" selected disabled>Select Payment Type</option>
                <option value="1">Cash</option>
                <option value="2">Bank Transfer</option>
            </select>
            <p class="text-danger" id="payment_type_error">{{$errors->first('payment_type')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
        </div>
       <!--  <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
            <input type="submit" name="submit" value="{{'ADD'}}" class="form-control btn-primary">
        </div> -->
        <!--  -->
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
            <button type="button" onclick="pre_add_confirm_setup();" class="form-control btn-primary">
                SUBMIT
            </button>
        </div>
        <!--  -->
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
            <input type="button" value="CANCEL" class="form-control cancel_btn" onclick="cancel_setup('register')">
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

            $("#where_work_error").text("");
            var where_work = $("#where_work").val();
            if(where_work == "" || where_work == "undefined"){
                $("#where_work_error").text("Where You Work is required !");
                valid = false;
            }

            $("#medical_specialities_error").text("");
            var medical_specialities = $("#medical_specialities").val();
            if(medical_specialities == "" || medical_specialities == "undefined"){
                $("#medical_specialities_error").text("Medical Specialities is required !");
                valid = false;
            }

            $("#phone_no_error").text("");
            var phone_no = $("#phone_no").val();
            if(phone_no == "" || phone_no == "undefined"){
                $("#phone_no_error").text("Phone No. is required !");
                valid = false;
            }

            $("#registration_category_error").text("");
            var registration_category = $("#registration_category").val();
            if(registration_category == "" || registration_category == "undefined" || registration_category == null){
                $("#registration_category_error").text("Registration Category is required !");
                valid = false;
            }

            $("#payment_type_error").text("");
            var payment_type = $("#payment_type").val();
            if(payment_type == "" || payment_type == "undefined" || payment_type == null){
                $("#payment_type_error").text("Payment Type is required !");
                valid = false;
            }


            if(valid == true){
                add_confirm_setup('register');
            }

        }

    </script>
@stop
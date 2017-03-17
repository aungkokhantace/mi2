@extends('layouts.master')
@section('title','Register')
@section('content')

        <!-- begin #content -->
<div id="content" class="content">

    <h1 class="page-header">{{'Register Confirm' }}</h1>

    {!! Form::open(array('url' => 'backend/register/confirm', 'class'=> 'form-horizontal user-form-border', 'id'=>'registerConfirmForm', 'files' => true)) !!}
    <input type="hidden" name="id" value="{{isset($register)? $register->id:''}}"/>
    <br/>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="first_name">First Name<span class="require">*</span></label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <input type="text" required class="form-control" id="first_name" name="first_name" placeholder="Enter First Name" value="{{ isset($register)? $register->first_name:Request::old('first_name') }}"/>
            <p class="text-danger">{{$errors->first('first_name')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="middle_name">Middle Name</label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <input type="text" class="form-control" id="middle_name" name="middle_name" placeholder="Enter Middle Name" value="{{ isset($register)? $register->middle_name:Request::old('middle_name') }}"/>
            <p class="text-danger">{{$errors->first('middle_name')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="last_name">Last Name<span class="require">*</span></label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name" value="{{ isset($register)? $register->last_name:Request::old('last_name') }}"/>
            <p class="text-danger">{{$errors->first('last_name')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="title">Title</label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <input type="text" class="form-control" id="title" name="title" placeholder="Enter Event Title" value="{{ isset($register)? $register->title:Request::old('title') }}"/>
            <p class="text-danger">{{$errors->first('title')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="email">Email<span class="require">*</span></label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <input type="text" readonly class="form-control" id="email" name="email" placeholder="Enter Email" value="{{ isset($register)? $register->email:Request::old('email') }}"/>
            <p class="text-danger">{{$errors->first('email')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="country">Country<span class="require">*</span></label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            {{--<input type="text" class="form-control" id="country" name="country" placeholder="Enter Country" value="{{ isset($register)? $register->country:Request::old('country') }}"/>--}}
            @if(isset($register))
                <select class="form-control" name="country" id="country">
                    @foreach($countries as $key=>$value)
                        @if($key == $register->country)
                            <option value="{{ $key }}" selected>{{ $value }}</option>
                        @else
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endif
                    @endforeach
                </select>
            @else
                <select class="form-control" name="country" id="country">
                    <option value="" selected disabled>Select Country</option>

                    @foreach($countries as $key=>$value)
                        <option value="{{$key}}">{{$value}}</option>
                    @endforeach
                </select>
            @endif
            <p class="text-danger">{{$errors->first('country')}}</p>
        </div>
    </div>

    {{--<div class="row">--}}
        {{--<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">--}}
            {{--<label for="where_work">Where you work</label>--}}
        {{--</div>--}}
        {{--<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">--}}
            {{--<input type="text" class="form-control" id="where_work" name="where_work" placeholder="Enter where you work" value="{{ isset($register)? $register->where_work:Request::old('where_work') }}"/>--}}
            {{--<p class="text-danger">{{$errors->first('where_work')}}</p>--}}
        {{--</div>--}}
    {{--</div>--}}

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="medical_specialities">Medication Specialities<span class="require">*</span></label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            {{--<input type="text" class="form-control" id="medical_specialities" name="medical_specialities" placeholder="Enter Medication Specialities" value="{{ isset($register)? $register->medical_speciality_name:Request::old('medical_specialities') }}"/>--}}
            @if(isset($register))
                <select class="form-control" name="medical_specialities" id="medical_specialities" onchange="check_for_other();">
                    @foreach($specialitiesArr as $key=>$specialities)
                        @if($key == "main_speciality")
                            @foreach($specialities as $mainSpeciality)
                                @if($mainSpeciality->id == $register->medical_speciality_id)
                                    <option value="{{$mainSpeciality->id}}" selected>{{$mainSpeciality->name}}</option>
                                @else
                                    <option value="{{$mainSpeciality->id}}">{{$mainSpeciality->name}}</option>
                                @endif
                            @endforeach
                        @else
                            <optgroup label="{{$key}}">
                                @foreach($specialities as $subSpeciality)
                                    @if($subSpeciality->option_group_name == $key)
                                        @if($subSpeciality->id == $register->medical_speciality_id)
                                            <option value="{{$subSpeciality->id}}" selected style="margin-left:20px;">{{$subSpeciality->name}}</option>
                                        @else
                                            <option value="{{$subSpeciality->id}}" style="margin-left:20px;">{{$subSpeciality->name}}</option>
                                        @endif
                                    @endif
                                @endforeach
                            </optgroup>
                        @endif
                    @endforeach
                    @if($register->medical_speciality_id == "0")
                        <option value="other" selected>Other</option>
                    @else
                        <option value="other">Other</option>
                    @endif
                </select>
            @else
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
            @endif
            <p class="text-danger">{{$errors->first('medical_specialities')}}</p>
        </div>
    </div>

    {{--@if(isset($register) && $register->medical_speciality_id == "0")--}}
        <div class="other row">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                <label for="other">Other Speciality<span class="require">*</span></label>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <input type="text" required class="form-control" id="other" name="other" placeholder="Enter Other Speciality Text" value="{{$register->medical_speciality_other}}"/>
                <p class="text-danger" id="other_error">{{$errors->first('other')}}</p>
            </div>
        </div>
    {{--@else--}}
        {{--<div class="other row">--}}
            {{--<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">--}}
                {{--<label for="other">Other Speciality<span class="require">*</span></label>--}}
            {{--</div>--}}
            {{--<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">--}}
                {{--<input type="text" required class="form-control" id="other" name="other" placeholder="Enter Other Speciality Text" value="{{Request::old('other')}}"/>--}}
                {{--<p class="text-danger" id="other_error">{{$errors->first('other')}}</p>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--@endif--}}

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="phone_no">Phone no<span class="require">*</span></label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <input type="text" class="form-control" id="phone_no" name="phone_no" placeholder="Enter Phone no" value="{{ isset($register)? $register->phone_no:Request::old('phone_no') }}"/>
            <p class="text-danger">{{$errors->first('phone_no')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="registration_category">Registration Category<span class="require">*</span></label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            {{--<input type="text" class="form-control" id="registration_category" name="registration_category" placeholder="Enter Registration Category" value="{{ isset($register)? $register->registration_category:Request::old('registration_category') }}"/>--}}
            @if(isset($register))
                <select class="form-control" name="registration_category" id="registration_category">
                    <option value="" selected disabled>Select Registration Category</option>
                    {{--<option value="1" @if($register->registration_category == 1) selected @endif>International Delegate</option>--}}
                    {{--<option value="2" @if($register->registration_category == 2) selected @endif>Local Delegate</option>--}}
                    {{--<option value="3" @if($register->registration_category == 3) selected @endif>Local Trainee</option>--}}
                    @foreach($registrationCategories as $registrationCategory)
                        @if($register->registration_category == $registrationCategory->id)
                            <option value="{{$registrationCategory->id}}" selected>{{$registrationCategory->name}}</option>
                        @else
                            <option value="{{$registrationCategory->id}}">{{$registrationCategory->name}}</option>
                        @endif
                    @endforeach
                </select>
            @else
                <select class="form-control" name="registration_category" id="registration_category">
                    <option value="" selected disabled>Select Registration Category</option>
                    {{--<option value="1">International Delegate</option>--}}
                    {{--<option value="2">Local Delegate</option>--}}
                    {{--<option value="3">Local Trainee</option>--}}
                    @foreach($registrationCategories as $registrationCategory)
                        <option value="{{$registrationCategory->id}}">{{$registrationCategory->name}}</option>
                    @endforeach
                </select>
            @endif
            <p class="text-danger">{{$errors->first('registration_category')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="payment_type">Payment Type<span class="require">*</span></label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            {{--<input type="text" class="form-control" id="payment_type" name="payment_type" placeholder="Enter Payment Type" value="{{ isset($register)? $register->payment_type:Request::old('payment_type') }}"/>--}}
            @if(isset($register))
                <select class="form-control" name="payment_type" id="payment_type">
                    <option value="1" @if($register->payment_type == 1) selected @endif>Cash</option>
                    <option value="2" @if($register->payment_type == 2) selected @endif>Bank Transfer</option>
                </select>
            @else
                <select class="form-control" name="payment_type" id="payment_type">
                    <option value="" selected disabled>Select Payment Type</option>
                    <option value="1">Cash</option>
                    <option value="2">Bank Transfer</option>
                </select>
            @endif
            <p class="text-danger">{{$errors->first('payment_type')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="register_image">Photo Upload<span class="require">*</span></label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <input type="file" class="form-control" id="register_image" name="register_image" placeholder="Enter Payment Type"/>
            <p class="text-danger">{{$errors->first('register_image')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
            <input type="submit" name="submit" value="{{'CONFIRM'}}" class="form-control btn-primary">
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
            <input type="button" value="CANCEL" class="form-control cancel_btn" onclick="cancel_setup('register')">
        </div>
    </div>
    {!! Form::close() !!}
</div>
@stop

@section('page_script')
<script type="text/javascript">
    $(document).ready(function() {
        var other_flag = document.getElementById('medical_specialities').value;
        if(other_flag == "other"){
            $(".other").show();
        }
        else{
            $(".other").hide();
        }

        //Start Validation for Entry and Edit Form
        $('#registerConfirmForm').validate({
            rules: {
                first_name                  : 'required',
                last_name                   : 'required',
                email                       : 'required',
                country                     : 'required',
                medical_specialities        : 'required',
                other                       : 'required',
                phone_no                    : 'required',
                registration_category       : 'required',
                payment_type                : 'required',
                register_image              : 'required',
            },
            messages: {
                first_name                  : 'First Name is required',
                last_name                   : 'Last Name is required',
                email                       : 'Email is required',
                country                     : 'Country is required',
                other                       : 'Other Speciality Text is required',
                phone_no                    : 'Phone Number is required',
                registration_category       : 'Registration Category is required',
                payment_type                : 'Payment Type is required',
                register_image              : 'Register Image is required',
            },
            submitHandler: function(form) {
                $('input[type="submit"]').attr('disabled','disabled');
                form.submit();
            }
        });
        //End Validation for Entry and Edit Form
    });

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
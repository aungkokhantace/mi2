@extends('layouts.master')
@section('title','Register')
@section('content')

        <!-- begin #content -->
<div id="content" class="content">

    <h1 class="page-header">{{'Register Confirm' }}</h1>

    {!! Form::open(array('url' => 'backend/register/confirm', 'class'=> 'form-horizontal user-form-border','files' => true)) !!}
    <input type="hidden" name="id" value="{{isset($register)? $register->id:''}}"/>
    <br/>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="first_name">First Name<span class="require">*</span></label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <input type="text" required class="form-control" id="first_name" name="first_name" placeholder="Enter First Name" value="{{ isset($register)? $register->first_name:Request::old('first_name') }}" readonly/>
            <p class="text-danger">{{$errors->first('first_name')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="middle_name">Middle Name</label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <input type="text" class="form-control" id="middle_name" name="middle_name" placeholder="Enter Middle Name" value="{{ isset($register)? $register->middle_name:Request::old('middle_name') }}" readonly/>
            <p class="text-danger">{{$errors->first('middle_name')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="last_name">Last Name</label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name" value="{{ isset($register)? $register->last_name:Request::old('last_name') }}" readonly/>
            <p class="text-danger">{{$errors->first('last_name')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="title">Title</label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <input type="text" class="form-control" id="title" name="title" placeholder="Enter Event Title" value="{{ isset($register)? $register->title:Request::old('title') }}" readonly/>
            <p class="text-danger">{{$errors->first('title')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="email">Email</label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email" value="{{ isset($register)? $register->email:Request::old('email') }}" readonly/>
            <p class="text-danger">{{$errors->first('email')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="country">Country</label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <input type="text" class="form-control" id="country" name="country" placeholder="Enter Country" value="{{ isset($register)? $register->country:Request::old('country') }}" readonly/>
            <p class="text-danger">{{$errors->first('country')}}</p>
        </div>
    </div>

    {{--<div class="row">--}}
        {{--<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">--}}
            {{--<label for="where_work">Where you work</label>--}}
        {{--</div>--}}
        {{--<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">--}}
            {{--<input type="text" class="form-control" id="where_work" name="where_work" placeholder="Enter where you work" value="{{ isset($register)? $register->where_work:Request::old('where_work') }}" readonly/>--}}
            {{--<p class="text-danger">{{$errors->first('where_work')}}</p>--}}
        {{--</div>--}}
    {{--</div>--}}

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="medical_specialities">Medication Specialities</label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <input type="text" class="form-control" id="medical_specialities" name="medical_specialities" placeholder="Enter Medication Specialities" value="{{ isset($register)? $register->medical_speciality_name:Request::old('medical_specialities') }}" readonly/>
            <p class="text-danger">{{$errors->first('medical_specialities')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="phone_no">Phone no</label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <input type="text" class="form-control" id="phone_no" name="phone_no" placeholder="Enter Phone no" value="{{ isset($register)? $register->phone_no:Request::old('phone_no') }}" readonly/>
            <p class="text-danger">{{$errors->first('phone_no')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="registration_category">Registration Category</label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <input type="text" class="form-control" id="registration_category" name="registration_category" placeholder="Enter Registration Category" value="{{ isset($register)? $register->registration_category:Request::old('registration_category') }}" readonly/>
            <p class="text-danger">{{$errors->first('registration_category')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="payment_type">Payment Type</label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <input type="text" class="form-control" id="payment_type" name="payment_type" placeholder="Enter Payment Type" value="{{ isset($register)? $register->payment_type:Request::old('payment_type') }}" readonly/>
            <p class="text-danger">{{$errors->first('payment_type')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="payment_type">Photo Upload</label>
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
@stop
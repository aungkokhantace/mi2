@extends('layouts.master')
@section('title','Register')
@section('content')

        <!-- begin #content -->
<div id="content" class="content">

    <h1 class="page-header">{{'Register Edit' }}</h1>

    {!! Form::open(array('url' => 'backend/register/update', 'class'=> 'form-horizontal user-form-border')) !!}
    <input type="hidden" name="id" value="{{isset($registers)? $registers->id:''}}"/>
    <br/>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="first_name">First Name<span class="require">*</span></label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <input type="text" required class="form-control" id="first_name" name="first_name" placeholder="Enter First Name" value="{{ isset($registers)? $registers->first_name:Request::old('first_name') }}"/>
            <p class="text-danger">{{$errors->first('first_name')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="middle_name">Middle Name</label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <input type="text" class="form-control" id="middle_name" name="middle_name" placeholder="Enter Middle Name" value="{{ isset($registers)? $registers->middle_name:Request::old('middle_name') }}"/>
            <p class="text-danger">{{$errors->first('middle_name')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="last_name">Last Name</label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name" value="{{ isset($registers)? $registers->last_name:Request::old('last_name') }}"/>
            <p class="text-danger">{{$errors->first('last_name')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="title">Title</label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <input type="text" class="form-control" id="title" name="title" placeholder="Enter Event Title" value="{{ isset($registers)? $registers->title:Request::old('title') }}"/>
            <p class="text-danger">{{$errors->first('title')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="email">Email</label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email" value="{{ isset($registers)? $registers->email:Request::old('email') }}"/>
            <p class="text-danger">{{$errors->first('email')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="country">Country</label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">


            <!-- <select class="form-control" name="country" id="country">
                <option value="" selected disabled>Select Country</option>
                    @foreach($countries as $key=>$value)
                    <option value="{{$key}}">{{$value}}</option>
                    @endforeach
                    </select> -->
            <!--  -->
            @if(isset($registers))
                <select class="form-control" name="country" id="country">
                    @foreach($countries as $key=>$value)
                        @if($key == $registers->country)
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

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="where_work">Where you work</label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <input type="text" class="form-control" id="where_work" name="where_work" placeholder="Enter where you work" value="{{ isset($registers)? $registers->where_work:Request::old('where_work') }}"/>
            <p class="text-danger">{{$errors->first('where_work')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="medical_specialities">Medication Specialities</label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <input type="text" class="form-control" id="medical_specialities" name="medical_specialities" placeholder="Enter Medication Specialities" value="{{ isset($registers)? $registers->medical_specialities:Request::old('medical_specialities') }}"/>
            <p class="text-danger">{{$errors->first('medical_specialities')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="phone_no">Phone no</label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <input type="text" class="form-control" id="phone_no" name="phone_no" placeholder="Enter Phone no" value="{{ isset($registers)? $registers->phone_no:Request::old('phone_no') }}"/>
            <p class="text-danger">{{$errors->first('phone_no')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="registration_category">Registration Category</label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            @if(isset($registers))
                <select class="form-control" name="registration_category" id="registration_category">
                    <option value="" selected disabled>Select Registration Category</option>
                    <option value="1" @if($registers->registration_category == 1) selected @endif>International Delegate</option>
                    <option value="2" @if($registers->registration_category == 2) selected @endif>Local Delegate</option>
                    <option value="3" @if($registers->registration_category == 3) selected @endif>Local Trainee</option>
                </select>
            @else
                <select class="form-control" name="registration_category" id="registration_category">
                    <option value="" selected disabled>Select Registration Category</option>
                    <option value="1">International Delegate</option>
                    <option value="2">Local Delegate</option>
                    <option value="3">Local Trainee</option>
                </select>
            @endif
            <p class="text-danger">{{$errors->first('registration_category')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="payment_type">Payment Type</label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            @if(isset($registers))
                <select class="form-control" name="payment_type" id="payment_type">
                    <option value="1" @if($registers->payment_type == 1) selected @endif>Cash</option>
                    <option value="2" @if($registers->payment_type == 2) selected @endif>Bank Transfer</option>
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
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
            <input type="submit" name="submit" value="{{'UPDATE'}}" class="form-control btn-primary">
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
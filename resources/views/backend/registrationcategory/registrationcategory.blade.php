<?php
/**
 * Created by PhpStorm.
 * Author: Wai Yan Aung
 * Date: 10/6/2016
 * Time: 5:43 PM
 */

?>

@extends('layouts.master')
@section('title','Registration Category')
@section('content')

        <!-- begin #content -->
<div id="content" class="content">

    <h1 class="page-header">{{isset($registrationcategory) ?  'Registration Category Edit' : 'Registration Category Entry' }}</h1>

    @if(isset($registrationcategory))
        {!! Form::open(array('url' => 'backend/registrationcategory/update', 'class'=> 'form-horizontal user-form-border', 'id' => 'registrationCategoryForm')) !!}
    @else
        {!! Form::open(array('url' => 'backend/registrationcategory/store', 'class'=> 'form-horizontal user-form-border', 'id' => 'registrationCategoryForm')) !!}
    @endif
    <input type="hidden" name="id" value="{{isset($registrationcategory)? $registrationcategory->id:''}}"/>
    <br/>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="name" class="text_bold_black">Name<span class="require">*</span></label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Registration Category Name" value="{{ isset($registrationcategory)? $registrationcategory->name:Request::old('name') }}"/>
            <p class="text-danger">{{$errors->first('name')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="currency_type" class="text_bold_black">Currency Type<span class="require">*</span></label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            @if(isset($registrationcategory))
                <select class="form-control" name="currency_type" id="currency_type">
                    @if($registrationcategory->currency_type == "usd")
                        <option value="usd" selected>USD</option>
                        <option value="mmk">MMK</option>
                    @else
                        <option value="usd">USD</option>
                        <option value="mmk" selected>MMK</option>
                    @endif
                </select>
            @else
                <select class="form-control" name="currency_type" id="currency_type">
                    <option value="" selected disabled>Select Currency Type</option>
                    <option value="usd">USD</option>
                    <option value="mmk">MMK</option>
                </select>
            @endif
            <p class="text-danger">{{$errors->first('currency_type')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="early_bird_fee" class="text_bold_black">Early Bird Fee<span class="require">*</span></label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <input type="text" class="form-control" id="early_bird_fee" name="early_bird_fee" placeholder="Enter Early Bird Fee" value="{{ isset($registrationcategory)? $registrationcategory->early_bird_fee:Request::old('early_bird_fee') }}"/>
            <p class="text-danger">{{$errors->first('early_bird_fee')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="normal_fee" class="text_bold_black">Normal Fee<span class="require">*</span></label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <input type="text" class="form-control" id="normal_fee" name="normal_fee" placeholder="Enter Normal Fee" value="{{ isset($registrationcategory)? $registrationcategory->normal_fee:Request::old('normal_fee') }}"/>
            <p class="text-danger">{{$errors->first('normal_fee')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="on_site_fee" class="text_bold_black">On Site Fee<span class="require">*</span></label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <input type="text" class="form-control" id="on_site_fee" name="on_site_fee" placeholder="Enter On Site Fee" value="{{ isset($registrationcategory)? $registrationcategory->on_site_fee:Request::old('on_site_fee') }}"/>
            <p class="text-danger">{{$errors->first('on_site_fee')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
            <input type="submit" name="submit" value="{{isset($registrationcategory)? 'UPDATE' : 'ADD'}}" class="form-control btn-primary">
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
            <input type="button" value="CANCEL" class="form-control cancel_btn" onclick="cancel_setup('registrationcategory')">
        </div>
    </div>
    {!! Form::close() !!}
</div>
@stop

@section('page_script')
    <script type="text/javascript">
        $(document).ready(function() {
            //Start Validation for Entry and Edit Form
            $('#registrationCategoryForm').validate({
                rules: {
                    name                  : 'required',
                    currency_type         : 'required',
                    early_bird_fee: {
                        required: true,
                        number: true
                    },
                    normal_fee: {
                        required: true,
                        number: true
                    },
                    on_site_fee: {
                        required: true,
                        number: true
                    },
                },
                messages: {
                    name                  : 'Registration Category Name is required',
                    currency_type         : 'Currency Type is required',
                    early_bird_fee: {
                        required: 'Early Bird Fee is required',
                        number  : 'Early Bird Fee must be numeric'
                    },
                    normal_fee: {
                        required: 'Normal Fee is required',
                        number  : 'Normal Fee must be numeric'
                    },
                    on_site_fee: {
                        required: 'On Site Fee is required',
                        number  : 'On Site Fee must be numeric'
                    },
                },
                submitHandler: function(form) {
                    $('input[type="submit"]').attr('disabled','disabled');
                    form.submit();
                }
            });
            //End Validation for Entry and Edit Form

            //For checkbox picker
            $(':checkbox').checkboxpicker();
        });
    </script>
@stop
<?php
/**
 * Created by PhpStorm.
 * Author: Wai Yan Aung
 * Date: 10/6/2016
 * Time: 5:43 PM
 */

?>

@extends('layouts.master')
@section('title','Event Email')
@section('content')

        <!-- begin #content -->
<div id="content" class="content">

    <h1 class="page-header">{{isset($eventemail) ?  'Event Email Edit' : 'Event Email Entry' }}</h1>

    @if(isset($eventemail))
        {!! Form::open(array('url' => 'backend/eventemail/update', 'class'=> 'form-horizontal user-form-border', 'id' => 'eventemailForm')) !!}
    @else
        {!! Form::open(array('url' => 'backend/eventemail/store', 'class'=> 'form-horizontal user-form-border', 'id' => 'eventemailForm')) !!}
    @endif
    <input type="hidden" name="id" value="{{isset($eventemail)? $eventemail->id:''}}"/>
    <br/>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="email" class="text_bold_black">Event Email<span class="require">*</span></label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <input type="text" class="form-control" id="email" name="email" placeholder="Enter Event Email" value="{{ isset($eventemail)? $eventemail->email:Request::old('email') }}"/>
            <p class="text-danger">{{$errors->first('email')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="description" class="text_bold_black">Description</label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <textarea class="form-control" id="description" name="description" placeholder="Enter Event Email Description" rows="5" cols="50">{{isset($eventemail)? $eventemail->description:Input::old('description')}}</textarea>
            <p class="text-danger">{{$errors->first('description')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="type" class="text_bold_black">Type<span class="require">*</span></label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            @if(isset($eventemail))
                <select class="form-control" name="type" id="type">
                        @if($eventemail->type == 1)
                            <option value="1" selected>Abstract</option>
                        @else
                            <option value="1">Abstract</option>
                        @endif
                </select>
            @else
                <select class="form-control" name="type" id="type">
                    <option value="" selected disabled>Select Event Email Type</option>
                    <option value="1">Abstract</option>
                </select>
            @endif
            <p class="text-danger">{{$errors->first('type')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
            <input type="submit" name="submit" value="{{isset($eventemail)? 'UPDATE' : 'ADD'}}" class="form-control btn-primary">
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
            <input type="button" value="CANCEL" class="form-control cancel_btn" onclick="cancel_setup('eventemail')">
        </div>
    </div>
    {!! Form::close() !!}
</div>
@stop

@section('page_script')
    <script type="text/javascript">
        $(document).ready(function() {
            //Start Validation for Entry and Edit Form
            $('#eventemailForm').validate({
                rules: {
                    email                  : 'required',
                    type                   : 'required',
                },
                messages: {
                    email                  : 'Event Email is required',
                    type                   : 'Event Email Type is required',
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
<?php
/**
 * Created by PhpStorm.
 * Author: Wai Yan Aung
 * Date: 10/6/2016
 * Time: 5:43 PM
 */

?>

@extends('layouts.master')
@section('title','Medical Speciality')
@section('content')

        <!-- begin #content -->
<div id="content" class="content">

    <h1 class="page-header">{{isset($medicalspeciality) ?  'Medical Speciality Edit' : 'Medical Speciality Entry' }}</h1>

    @if(isset($medicalspeciality))
        {!! Form::open(array('url' => 'backend/medicalspeciality/update', 'class'=> 'form-horizontal user-form-border', 'id' => 'medicalspecialityForm')) !!}
    @else
        {!! Form::open(array('url' => 'backend/medicalspeciality/store', 'class'=> 'form-horizontal user-form-border', 'id' => 'medicalspecialityForm')) !!}
    @endif
    <input type="hidden" name="id" value="{{isset($medicalspeciality)? $medicalspeciality->id:''}}"/>
    <br/>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="name" class="text_bold_black">Name<span class="require">*</span></label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Medical Speciality Name" value="{{ isset($medicalspeciality)? $medicalspeciality->name:Request::old('name') }}"/>
            <p class="text-danger">{{$errors->first('name')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="option_group_name" class="text_bold_black">Option Group Name<span class="require">*</span></label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <input type="text" class="form-control" id="option_group_name" name="option_group_name" placeholder="Enter Option Group Name" value="{{ isset($medicalspeciality)? $medicalspeciality->option_group_name:Request::old('option_group_name') }}"/>
            <p class="text-danger">{{$errors->first('option_group_name')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="description" class="text_bold_black">Description</label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <textarea class="form-control" id="description" name="description" placeholder="Enter Medical Speciality Description" rows="5" cols="50">{{isset($medicalspeciality)? $medicalspeciality->description:Input::old('description')}}</textarea>
            <p class="text-danger">{{$errors->first('description')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
            <input type="submit" name="submit" value="{{isset($medicalspeciality)? 'UPDATE' : 'ADD'}}" class="form-control btn-primary">
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
            <input type="button" value="CANCEL" class="form-control cancel_btn" onclick="cancel_setup('medicalspeciality')">
        </div>
    </div>
    {!! Form::close() !!}
</div>
@stop

@section('page_script')
    <script type="text/javascript">
        $(document).ready(function() {
            //Start Validation for Entry and Edit Form
            $('#medicalspecialityForm').validate({
                rules: {
                    name                  : 'required',
//                    option_group_name     : 'required'
                },
                messages: {
                    name                  : 'Medical Speciality Name is required',
//                    option_group_name     : 'Option Group Name is required'
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
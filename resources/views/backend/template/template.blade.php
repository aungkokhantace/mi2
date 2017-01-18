<?php
/**
 * Created by PhpStorm.
 * Author: Wai Yan Aung
 * Date: 10/6/2016
 * Time: 5:43 PM
 */

?>

@extends('layouts.master')
@section('title','Template')
@section('content')

        <!-- begin #content -->
<div id="content" class="content">

    <h1 class="page-header">{{isset($template) ?  'Template Edit' : 'Template Entry' }}</h1>

    @if(isset($template))
        {!! Form::open(array('url' => 'backend/template/update', 'class'=> 'form-horizontal user-form-border', 'id' => 'templateForm')) !!}
    @else
        {!! Form::open(array('url' => 'backend/template/store', 'class'=> 'form-horizontal user-form-border', 'id' => 'templateForm')) !!}
    @endif
    <input type="hidden" name="id" value="{{isset($template)? $template->id:''}}"/>
    <br/>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="name" class="text_bold_black">Name<span class="require">*</span></label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Template Name" value="{{ isset($template)? $template->name:Request::old('name') }}"/>
            <p class="text-danger">{{$errors->first('name')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="description" class="text_bold_black">Description</label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <textarea class="form-control" id="description" name="description" placeholder="Enter Template Description" rows="5" cols="50">{{isset($template)? $template->description:Input::old('description')}}</textarea>
            <p class="text-danger">{{$errors->first('description')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="has_slider" class="text_bold_black">Has_Slider</label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            @if(isset($template))
                <input type="checkbox" name="has_slider" value="1" @if($template->has_slider == 1)checked @endif>
            @else
                <input type="checkbox" name="has_slider" value="1" @if(Input::old('has_slider')==1)checked @endif checked>
            @endif
        </div>
    </div>
    <br/>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="has_sidebar" class="text_bold_black">Has_Sidebar</label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            @if(isset($template))
                <input type="checkbox" name="has_sidebar" value="1" @if($template->has_sidebar == 1)checked @endif>
            @else
                <input type="checkbox" name="has_sidebar" value="1" @if(Input::old('has_sidebar')==1)checked @endif checked>
            @endif
        </div>
    </div>
    <br/>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="active" class="text_bold_black">Active</label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            @if(isset($template))
                <input type="checkbox" name="active" value="1" @if($template->active == 1)checked @endif>
            @else
                <input type="checkbox" name="active" value="1" @if(Input::old('active')==1)checked @endif checked>
            @endif
        </div>
    </div>
    <br/>

    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
            <input type="submit" name="submit" value="{{isset($template)? 'UPDATE' : 'ADD'}}" class="form-control btn-primary">
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
            <input type="button" value="CANCEL" class="form-control cancel_btn" onclick="cancel_setup('template')">
        </div>
    </div>
    {!! Form::close() !!}
</div>
@stop

@section('page_script')
    <script type="text/javascript">
        $(document).ready(function() {
            //Start Validation for Entry and Edit Form
            $('#templateForm').validate({
                rules: {
                    name     : 'required'
                },
                messages: {
                    name     : 'Template Name is required'
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
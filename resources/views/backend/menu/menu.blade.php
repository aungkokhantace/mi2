<?php
/**
 * Created by PhpStorm.
 * Author: Wai Yan Aung
 * Date: 10/6/2016
 * Time: 5:43 PM
 */

?>

@extends('layouts.master')
@section('title','Menu')
@section('content')

        <!-- begin #content -->
<div id="content" class="content">

    <h1 class="page-header">{{isset($menu) ?  'Menu Edit' : 'Menu Entry' }}</h1>

    @if(isset($menu))
        {!! Form::open(array('url' => 'backend/menu/update', 'class'=> 'form-horizontal user-form-border', 'id' => 'menuForm')) !!}
    @else
        {!! Form::open(array('url' => 'backend/menu/store', 'class'=> 'form-horizontal user-form-border', 'id' => 'menuForm')) !!}
    @endif
    <input type="hidden" name="id" value="{{isset($menu)? $menu->id:''}}"/>
    <br/>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="name" class="text_bold_black">Name<span class="require">*</span></label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <input type="text" required class="form-control" id="name" name="name" placeholder="Enter Menu Name" value="{{ isset($menu)? $menu->name:Request::old('name') }}"/>
            <p class="text-danger">{{$errors->first('name')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="description" class="text_bold_black">Description</label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <textarea class="form-control" id="description" name="description" placeholder="Enter Menu Description" rows="5" cols="50">{{isset($menu)? $menu->description:Input::old('description')}}</textarea>
            <p class="text-danger">{{$errors->first('description')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="category" class="text_bold_black">Category<span class="require">*</span></label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            @if(isset($menu))
                <select class="form-control" name="category" id="category">
                    @foreach($menuCategories as $key => $menuCategory)
                        @if($key == $menu->category)
                            <option value="{{$key}}" selected>{{$menuCategory}}</option>
                        @else
                            <option value="{{$key}}">{{$menuCategory}}</option>
                        @endif
                    @endforeach
                </select>
            @else
                <select class="form-control" name="category" id="category">
                    <option value="" selected disabled>Select Menu Category</option>
                    @foreach($menuCategories as $key => $menuCategory)
                        <option value="{{$key}}">{{$menuCategory}}</option>
                    @endforeach
                </select>
            @endif
            <p class="text-danger">{{$errors->first('category')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="active" class="text_bold_black">Active</label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            @if(isset($menu))
                <input type="checkbox" name="active" value="1" @if($menu->active == 1)checked @endif>
            @else
                <input type="checkbox" name="active" value="1" @if(Input::old('active')==1)checked @endif checked>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
            <input type="submit" name="submit" value="{{isset($menu)? 'UPDATE' : 'ADD'}}" class="form-control btn-primary">
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
            <input type="button" value="CANCEL" class="form-control cancel_btn" onclick="cancel_setup('menu')">
        </div>
    </div>
    {!! Form::close() !!}
</div>
@stop

@section('page_script')
    <script type="text/javascript">
        $(document).ready(function() {
            //Start Validation for Menu Entry and Edit Form
            $('#menuForm').validate({
                rules: {
                    name                  : 'required',
                    category              : 'required'
                },
                messages: {
                    name                  : 'Menu Name is required',
                    category              : 'Menu Category is required'
                },
                submitHandler: function(form) {
                    $('input[type="submit"]').attr('disabled','disabled');
                    form.submit();
                }
            });
            //End Validation for Menu Entry and Edit Form

            //For checkbox picker
            $(':checkbox').checkboxpicker();
        });
    </script>
@stop
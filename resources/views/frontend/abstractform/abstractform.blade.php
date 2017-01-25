<?php
/**
 * Created by PhpStorm.
 * User: Mi Tin Zar Kyaw
 * Date: 1/16/2017
 * Time: 10:57 AM
 */
?>
@extends('layouts.master')
@section('title','Abstractform')
@section('content')

<!-- begin #content -->
<div id="content" class="content">

    <h1 class="page-header">{{ 'Abstractform Entry'  }}</h1>

    {!! Form::open(array('url' => 'abstractform/store', 'class'=> 'form-horizontal user-form-border', 'files'=> 'true')) !!}

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="first_name">First Name<span class="require">*</span></label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <input type="text" required class="form-control" id="first_name" name="first_name" placeholder="Enter First Name" value=""/>
            <p class="text-danger">{{$errors->first('first_name')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="middle_name">Middle Name</label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <input type="text" class="form-control" id="middle_name" name="middle_name" placeholder="Enter Middle Name" value=""/>
            <p class="text-danger">{{$errors->first('middle_name')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="last_name">Last Name<span class="require">*</span></label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <input type="text" required class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name" value=""/>
            <p class="text-danger">{{$errors->first('last_name')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="email">Email</label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" value=""/>
            <p class="text-danger">{{$errors->first('url')}}</p>
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
            <p class="text-danger">{{$errors->first('country')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="medical_specialities">Medication Specialities</label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <input type="text" class="form-control" id="medical_specialities" name="medical_specialities" placeholder="Enter Medical Specialities" value=""/>
            <p class="text-danger">{{$errors->first('medical_specialities')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="abstract_file_path">File Upload</label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <input type="file" class="form-control" id="abstract_file_path" name="abstract_file_path" placeholder="Enter Abstract File Path" value=""/>
            <p class="text-danger">{{$errors->first('abstract_file_path')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
            <input type="submit" name="submit" value="{{'ADD'}}" class="form-control btn-primary">
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
            <input type="button" value="CANCEL" class="form-control cancel_btn" onclick="cancel_setup('page')">
        </div>
    </div>
    {!! Form::close() !!}
</div>
@stop

@section('page_script')
@stop
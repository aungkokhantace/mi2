<?php
/**
 * Created by PhpStorm.
 * User: Mi Tin Zar Kyaw
 * Date: 1/16/2017
 * Time: 10:57 AM
 */
?>
@extends('layouts.master')
@section('title','Abstract Form')
@section('content')

<!-- begin #content -->
<div id="content" class="content">

    <h1 class="page-header">{{'Abstract Form Reject'  }}</h1>

    {!! Form::open(array('url' => 'backend/abstractform/reject', 'class'=> 'form-horizontal user-form-border', 'id' => 'abstractForm', 'files'=> 'true')) !!}


    <input type="hidden" name="id" value="{{isset($abstractforms)? $abstractforms->id:''}}"/>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="first_name">First Name<span class="require">*</span></label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <input type="text" required class="form-control" id="first_name" name="first_name" placeholder="Enter First Name" value="{{ isset($abstractforms)? $abstractforms->first_name:Request::old('first_name') }}"/>
            <p class="text-danger">{{$errors->first('first_name')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="middle_name">Middle Name</label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <input type="text" class="form-control" id="middle_name" name="middle_name" placeholder="Enter Middle Name" value="{{ isset($abstractforms)? $abstractforms->middle_name:Request::old('middle_name') }}"/>
            <p class="text-danger">{{$errors->first('middle_name')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="last_name">Last Name<span class="require">*</span></label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <input type="text" required class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name" value="{{ isset($abstractforms)? $abstractforms->last_name:Request::old('last_name') }}"/>
            <p class="text-danger">{{$errors->first('last_name')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="title">Title<span class="require">*</span></label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            {{--<input type="text" class="form-control" id="title" name="title" placeholder="Enter Event Title" value="{{ isset($abstractforms)? $abstractforms->title:Request::old('title') }}"/>--}}
            @if(isset($abstractforms))
                <select class="form-control" name="title" id="title">
                    @if($abstractforms->title == 1)
                        <option value="1" selected>Dr.</option>
                    @else
                        <option value="1">Dr.</option>
                    @endif
                    @if($abstractforms->title == 2)
                        <option value="2" selected>Professor</option>
                    @else
                        <option value="2">Professor</option>
                    @endif
                    @if($abstractforms->title == 3)
                        <option value="3" selected>Mr.</option>
                    @else
                        <option value="3">Mr.</option>
                    @endif
                    @if($abstractforms->title == 4)
                        <option value="4" selected>Mrs.</option>
                    @else
                        <option value="4">Mrs.</option>
                    @endif
                    @if($abstractforms->title == 5)
                        <option value="5" selected>Ms.</option>
                    @else
                        <option value="5">Ms.</option>
                    @endif
                </select>
            @else
                <select class="form-control" name="title" id="title">
                    <option value="" selected disabled>Select Title</option>
                    <option value="1">Dr.</option>
                    <option value="2">Professor</option>
                    <option value="3">Mr.</option>
                    <option value="4">Mrs.</option>
                    <option value="5">Ms.</option>
                </select>
            @endif
            <p class="text-danger">{{$errors->first('title')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="email">Email<span class="require">*</span></label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" value="{{ isset($abstractforms)? $abstractforms->email:Request::old('email') }}"/>
            <p class="text-danger">{{$errors->first('email')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="country">Country<span class="require">*</span></label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">            
            @if(isset($abstractforms))
            <select class="form-control" name="country" id="country">                   
                @foreach($countries as $key=>$value)
                    @if($abstractforms->country == $key)
                        <option value="{{$key}}" selected>{{$value}}</option>
                    @else
                        <option value="{{$key}}">{{ $value }}</option>
                    @endif
                @endforeach
            </select>
             @else
             <select class="form-control" name="country" id="country">                   
                <option value="" selected disabled>Select Country</option>
                    @foreach($countries as $key=>$value)
                <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
            </select>
            @endif
            <p class="text-danger">{{$errors->first('country')}}</p>
        </div>
    </div>

    <div class="row entry_row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="first_name">Abstract Title<span class="require">*</span></label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            {{--<input type="text" class="form-control" id="abstract_title" name="abstract_title" placeholder="Enter Abstract Title" value="{{Request::old('abstract_title') }}"/>--}}
            <textarea class="form-control"  rows="3" cols="50" id="abstract_title" name="abstract_title" placeholder="Enter Abstract Title">{{isset($abstractforms)? $abstractforms->abstract_title :Request::old('abstract_title')}}</textarea>
            <p class="text-danger" id="abstract_title_error">{{$errors->first('abstract_title')}}</p>
        </div>
    </div>

    {{--<div class="row">--}}
        {{--<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">--}}
            {{--<label for="medical_specialities">Medication Specialities</label>--}}
        {{--</div>--}}
        {{--<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">--}}
            {{--<input type="text" class="form-control" id="medical_specialities" name="medical_specialities" placeholder="Enter Medical Specialities" value="{{ isset($abstractforms)? $abstractforms->medical_specialities:Request::old('medical_specialities') }}"/>--}}
            {{--<p class="text-danger">{{$errors->first('medical_specialities')}}</p>--}}
        {{--</div>--}}
    {{--</div>--}}
    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="medical_specialities">Medication Specialities</label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            {{--<input type="text" class="form-control" id="medical_specialities" name="medical_specialities" placeholder="Enter Medication Specialities" value="{{ isset($abstractforms)? $abstractforms->medical_specialities:Request::old('medical_specialities') }}"/>--}}
            @if(isset($abstractforms))
                <select class="form-control" name="medical_specialities" id="medical_specialities" onchange="check_for_other();">
                    @foreach($specialitiesArr as $key=>$specialities)
                        @if($key == "main_speciality")
                            @foreach($specialities as $mainSpeciality)
                                @if($mainSpeciality->id == $abstractforms->medical_speciality_id)
                                    <option value="{{$mainSpeciality->id}}" selected>{{$mainSpeciality->name}}</option>
                                @else
                                    <option value="{{$mainSpeciality->id}}">{{$mainSpeciality->name}}</option>
                                @endif
                            @endforeach
                        @else
                            <optgroup label="{{$key}}">
                                @foreach($specialities as $subSpeciality)
                                    @if($subSpeciality->option_group_name == $key)
                                        @if($subSpeciality->id == $abstractforms->medical_speciality_id)
                                            <option value="{{$subSpeciality->id}}" selected style="margin-left:20px;">{{$subSpeciality->name}}</option>
                                        @else
                                            <option value="{{$subSpeciality->id}}" style="margin-left:20px;">{{$subSpeciality->name}}</option>
                                        @endif
                                    @endif
                                @endforeach
                            </optgroup>
                        @endif
                    @endforeach
                    @if($abstractforms->medical_speciality_id == "0")
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

    {{--@if(isset($abstractforms) && $abstractforms->medical_speciality_id == 0)--}}
        <div class="other row">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                <label for="other">Other Speciality<span class="require">*</span></label>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <input type="text" class="form-control" id="other" name="other" placeholder="Enter Other Speciality Text" value="{{$abstractforms->medical_speciality_other}}"/>
                <p class="text-danger" id="other_error">{{$errors->first('other')}}</p>
            </div>
        </div>
    {{--@else--}}

    {{--@endif--}}

    {{--<div class="other row">--}}
        {{--<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">--}}
            {{--<label for="other">Other Speciality<span class="require">*</span></label>--}}
        {{--</div>--}}
        {{--<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">--}}
            {{--<input type="text" class="form-control" id="other" name="other" placeholder="Enter Other Speciality Text" value="{{Request::old('other')}}"/>--}}
            {{--<p class="text-danger" id="other_error">{{$errors->first('other')}}</p>--}}
        {{--</div>--}}
    {{--</div>--}}

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="abstract_file_path">File Upload</label>
        </div>
         @if(isset($abstractforms))
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <a target="_blank" href="/{{isset($abstractforms)? $abstractforms->abstract_file_path:Request::old('abstract_file_path')}}">{{isset($abstractforms)? $abstractforms->abstract_file_path:Request::old('abstract_file_path')}}</a>
                <p class="text-danger">{{$errors->first('abstract_file_path')}}</p>
            </div>
             @else
             <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <input type="file" class="form-control" id="abstract_file_path" name="abstract_file_path" placeholder="Enter Abstract File Path" value="{{ isset($abstractforms)? $abstractforms->abstract_file_path:Request::old('abstract_file_path') }}"/>
                <p class="text-danger">{{$errors->first('abstract_file_path')}}</p>
            </div>
        @endif
        
    </div>

    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
            @if(isset($abstractforms) && $abstractforms->status != "reject")
                <input type="submit" name="reject" id="reject" value="REJECT" class="form-control btn-warning submit">
            @endif
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
            <input type="button" value="CANCEL" class="form-control cancel_btn" onclick="cancel_setup('abstractform')">
        </div>
    </div>
    {!! Form::close() !!}
</div>
@stop

@section('page_script')
    <script type="text/javascript" language="javascript" class="init">
        $(document).ready(function() {
            var other_flag = document.getElementById('medical_specialities').value;
            if(other_flag == "other"){
                $(".other").show();
            }
            else{
                $(".other").hide();
            }

//            //Start Validation for Entry and Edit Form
            $('#abstractForm').validate({
                rules: {
                    first_name                  : 'required',
                    last_name                   : 'required',
                    email                       : 'required',
                    country                     : 'required',
                    abstract_title              : 'required',
                    other                       : 'required',
                },
                messages: {
                    first_name                  : 'First Name is required',
                    last_name                   : 'Last Name is required',
                    email                       : 'Email is required',
                    country                     : 'Country is required',
                    abstract_title              : 'Abstract Title is required',
                    other                       : 'Other Speciality Text is required',
                },
                submitHandler: function(form) {
                    $('input[type="submit"]').attr('disabled','disabled');
                    form.submit();
                }
            });
//            //End Validation for Entry and Edit Form

//            $('.submit').on('click', function(e){
//                //When a submit is clicked
//                e.preventDefault();
//                //prevent submit button default action
//                var submitBtn = $(this).attr('id');
//                //get the id of the submit
////                alert(submitBtn);
//            if(submitBtn == 'confirm'){
//                alert('confirmed');
//                //Start Validation for Entry and Edit Form
//                $('#abstractConfirm').validate({
//                    rules: {
//                        first_name                  : 'required',
//                        last_name                   : 'required',
//                        email                       : 'required',
//                        country                     : 'required',
//                        other                       : 'required',
//                    },
//                    messages: {
//                        first_name                  : 'First Name is required',
//                        last_name                   : 'Last Name is required',
//                        email                       : 'Email is required',
//                        country                     : 'Country is required',
//                        other                       : 'Other Speciality Text is required',
//                    },
//                submitHandler: function(form) {
//                    $('input[type="submit"]').attr('disabled','disabled');
////                    form.submit();
////                    $("#abstractConfirm").submit();
//                    document.getElementById("abstractConfirm").submit();
//                }
//                });
//                //End Validation for Entry and Edit Form
////                $("#abstractConfirm").submit();
//            }else{
//                alert('rejected');
//                alert(document.getElementById("abstractReject"));
////                $("#abstractReject").submit();
//                document.getElementById("abstractReject").submit();
//            }
//            });
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
@stop 
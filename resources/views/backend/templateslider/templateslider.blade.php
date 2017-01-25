<?php
/**
 * Created by PhpStorm.
 * Author: Wai Yan Aung
 * Date: 10/6/2016
 * Time: 5:43 PM
 */

?>

@extends('layouts.master')
@section('title','Template Slider')
@section('content')

        <!-- begin #content -->
<div id="content" class="content">

    <h1 class="page-header">{{isset($templateslider) ?  'Template Slider Edit' : 'Template Slider Entry' }}</h1>

    @if(isset($templateslider))
        {!! Form::open(array('url' => 'backend/templateslider/update', 'class'=> 'form-horizontal user-form-border', 'id' => 'templatesliderForm')) !!}
    @else
        {!! Form::open(array('url' => 'backend/templateslider/store', 'class'=> 'form-horizontal user-form-border', 'id' => 'templatesliderForm')) !!}
    @endif
    <input type="hidden" name="id" value="{{isset($templateslider)? $templateslider->id:''}}"/>
    <br/>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="name" class="text_bold_black">Name<span class="require">*</span></label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <input type="text" required class="form-control" id="name" name="name" placeholder="Enter Template Slider Name" value="{{ isset($templateslider)? $templateslider->name:Request::old('name') }}"/>
            <p class="text-danger">{{$errors->first('name')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="description" class="text_bold_black">Description</label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <textarea class="form-control" id="description" name="description" placeholder="Enter Template Slider Description" rows="5" cols="50">{{isset($templateslider)? $templateslider->description:Input::old('description')}}</textarea>
            <p class="text-danger">{{$errors->first('description')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="template_id" class="text_bold_black">Template<span class="require">*</span></label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            @if(isset($templateslider))
                <select class="form-control" name="template_id" id="template_id">
                    @foreach($templates as $template)
                        @if($templateslider->template_id == $template->id)
                            <option value="{{$template->id}}" selected>{{$template->name}}</option>
                        @else
                            <option value="{{$template->id}}">{{$template->name}}</option>
                        @endif
                    @endforeach
                </select>
            @else
                <select class="form-control" name="template_id" id="template_id">
                    <option value="" selected disabled>Select Slider Template</option>
                    @foreach($templates as $template)
                        <option value="{{$template->id}}">{{$template->name}}</option>
                    @endforeach
                </select>
            @endif
            <p class="text-danger">{{$errors->first('template_id')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="active" class="text_bold_black">Active</label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            @if(isset($templateslider))
                <input type="checkbox" name="active" value="1" class="checkboxpicker" @if($templateslider->active == 1)checked @endif>
            @else
                <input type="checkbox" name="active" value="1" class="checkboxpicker" @if(Input::old('active')==1)checked @endif checked>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
            <input type="submit" name="submit" value="{{isset($templateslider)? 'UPDATE' : 'ADD'}}" class="form-control btn-primary">
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
            <input type="button" value="CANCEL" class="form-control cancel_btn" onclick="cancel_setup('templateslider')">
        </div>
    </div>
    {!! Form::close() !!}

    @if(isset($templateslider))
    <br><hr>
    {{--Start Slider View--}}
    <div id="slider_view" class="slider_view">

        <h1 class="page-header">Slider View</h1>
        <br>
        <div class="row">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    @if(isset($images) && count($images)>0)
                        @foreach($images as $k=>$image)
                            <div class="item @if($k == 0) active @endif">
                                <img src="/{{$image->image_url}}" alt="Image">
                            </div>
                        @endforeach
                    @else
                        <div class="item active">
                            <img src="/images/aceplus_logo.png" alt="Image">
                        </div>
                    @endif
                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
    {{--End Slider View--}}

    <br><br>

    {{--Start Slider Image List--}}
    <div id="image_list" class="image_list">

        <h1 class="page-header">Slider Image List</h1>
        <div class="row">
            <div class="col-md-10"></div>
            <div class="col-md-2">
                <div class="buttons pull-right">
                    <button type="button" onclick="add_image('templatesliderdetail');" class="btn btn-default btn-md first_btn">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button>
                    <button type="button" onclick="delete_setup('templatesliderdetail');" class="btn btn-default btn-md third_btn">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </button>
                </div>
            </div>

        </div>

        {!! Form::open(array('id'=> 'frm_templatesliderdetail' ,'url' => 'backend/templatesliderdetail/destroy', 'class'=> 'form-horizontal user-form-border')) !!}
        {{ csrf_field() }}
        <input type="hidden" id="slider_id" name="slider_id" value="{{$templateslider->id}}">
        <input type="hidden" id="selected_checkboxes" name="selected_checkboxes" value="">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="listing">
                    <input type="hidden" id="pageSearchedValue" name="pageSearchedValue" value="">
                    <table class="table table-striped list-table" id="list-table">
                        <col width="20">
                        <thead>
                        <tr>
                            <th ><input type='checkbox' name='check' id='check_all'/></th>
                            <th>Image</th>
                            <th>Image Name</th>
                            <th>Image Description</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($images as $image)
                            <tr>
                                <td><input type="checkbox" class="check_source" name="edit_check" value="{{ $image->id }}" id="all"></td>
                                <td><img src="/{{$image->image_url}}" style="width:200px; height:150px;" alt="Image"></td>
                                <td>{{$image->image_name}}</td>
                                <td>{{$image->description}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {!! Form::close() !!}

    </div>
    {{--End Slider Image List--}}
    @endif

</div>
@stop

@section('page_script')
    <script type="text/javascript">
        $(document).ready(function() {
            //Start Validation for Entry and Edit Form
            $('#templatesliderForm').validate({
                rules: {
                    name                  : 'required',
                    template_id           : 'required'
                },
                messages: {
                    name                  : 'Template Slider Name is required',
                    template_id           : 'Slider Template is required'
                },
                submitHandler: function(form) {
                    $('input[type="submit"]').attr('disabled','disabled');
                    form.submit();
                }
            });
            //End Validation for Entry and Edit Form

            //For checkbox picker
//            $(':checkbox').checkboxpicker();
            $('.checkboxpicker').checkboxpicker();


        });

        function add_image(){
            var slider_id = document.getElementById("slider_id").value;
            window.location ='/backend/templatesliderdetail/create/'+slider_id;
        }
    </script>
@stop
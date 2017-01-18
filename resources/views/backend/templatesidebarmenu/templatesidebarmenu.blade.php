<?php
/**
 * Created by PhpStorm.
 * Author: Wai Yan Aung
 * Date: 10/6/2016
 * Time: 5:43 PM
 */

?>

@extends('layouts.master')
@section('title','Template Sidebar Menu')
@section('content')

        <!-- begin #content -->
<div id="content" class="content">

    <h1 class="page-header">{{isset($templatesidebarmenu) ?  'Template Sidebar Menu Edit' : 'Template Sidebar Menu Entry' }}</h1>

    @if(isset($templatesidebarmenu))
        {!! Form::open(array('url' => 'backend/templatesidebarmenu/update', 'class'=> 'form-horizontal user-form-border', 'id' => 'templatesidebarmenuForm')) !!}
    @else
        {!! Form::open(array('url' => 'backend/templatesidebarmenu/store', 'class'=> 'form-horizontal user-form-border', 'id' => 'templatesidebarmenuForm')) !!}
    @endif
    <input type="hidden" name="id" value="{{isset($templatesidebarmenu)? $templatesidebarmenu->id:''}}"/>
    <br/>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="name" class="text_bold_black">Name<span class="require">*</span></label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Template Sidebar Menu Name" value="{{ isset($templatesidebarmenu)? $templatesidebarmenu->name:Request::old('name') }}"/>
            <p class="text-danger">{{$errors->first('name')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="description" class="text_bold_black">Description</label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <textarea class="form-control" id="description" name="description" placeholder="Enter Template Description" rows="5" cols="50">{{isset($templatesidebarmenu)? $templatesidebarmenu->description:Input::old('description')}}</textarea>
            <p class="text-danger">{{$errors->first('description')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="template_id" class="text_bold_black">Template<span class="require">*</span></label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <select class="form-control" name="template_id" id="template_id">
                @if(isset($templatesidebarmenu))
                    @foreach($templates as $template)
                        @if($template->id == $templatesidebarmenu->template_id)
                            <option value="{{$template->id}}" selected>{{$template->name}}</option>
                        @else
                            <option value="{{$template->id}}">{{$template->name}}</option>
                        @endif
                    @endforeach
                @else
                    <option value="" selected disabled>Select Template</option>
                    @foreach($templates as $template)
                        <option value="{{$template->id}}">{{$template->name}}</option>
                    @endforeach
                @endif
            </select>
            <p class="text-danger">{{$errors->first('template_id')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="page_id" class="text_bold_black">Pages<span class="require">*</span></label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <select class="form-control" name="page_id" id="page_id">
                @if(isset($templatesidebarmenu))
                    @foreach($pages as $page)
                        @if($page->id == $templatesidebarmenu->page_id)
                            <option value="{{$page->id}}" selected>{{$page->name}}</option>
                        @else
                            <option value="{{$page->id}}">{{$page->name}}</option>
                        @endif
                    @endforeach
                @else
                    <option value="" selected disabled>Select Page</option>
                    @foreach($pages as $page)
                        <option value="{{$page->id}}">{{$page->name}}</option>
                    @endforeach
                @endif
            </select>
            <p class="text-danger">{{$errors->first('page_id')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="menu_order" class="text_bold_black">Menu Order</label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <select class="form-control" name="menu_order" id="menu_order">
                @if(isset($templatesidebarmenu))
                    @for ($i = 1; $i <= 100; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                        @if($i == $templatesidebarmenu->menu_order)
                            <option value="{{ $i }}" selected>{{ $i }}</option>
                        @else
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endif
                    @endfor
                @else
                    @for ($i = 1; $i <= 100; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                @endif
            </select>
            <p class="text-danger">{{$errors->first('menu_order')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="menu_parent_id" class="text_bold_black">Menu Parent<span class="require">*</span></label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <select class="form-control" name="menu_parent_id" id="menu_parent_id">
                @if(isset($templatesidebarmenu))
                    @foreach($menus as $menu)
                        @if($menu->id == $templatesidebarmenu->menu_parent_id)
                            <option value="{{$menu->id}}" selected>{{$menu->name}}</option>
                        @else
                            <option value="{{$menu->id}}">{{$menu->name}}</option>
                        @endif
                    @endforeach
                @else
                    <option value="" selected disabled>Select Menu Parent</option>
                    @foreach($menus as $menu)
                        <option value="{{$menu->id}}">{{$menu->name}}</option>
                    @endforeach
                @endif
            </select>
            <p class="text-danger">{{$errors->first('menu_parent_id')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
            <input type="submit" name="submit" value="{{isset($templatesidebarmenu)? 'UPDATE' : 'ADD'}}" class="form-control btn-primary">
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
            <input type="button" value="CANCEL" class="form-control cancel_btn" onclick="cancel_setup('templatesidebarmenu')">
        </div>
    </div>
    {!! Form::close() !!}
</div>
@stop

@section('page_script')
    <script type="text/javascript">
        $(document).ready(function() {
            //Start Validation for Entry and Edit Form
            $('#templatesidebarmenuForm').validate({
                rules: {
                    name            : 'required',
                    template_id     : 'required',
                    page_id         : 'required',
                    menu_order      : 'required',
                    menu_parent_id  : 'required'
                },
                messages: {
                    name            : 'Template Sidebar Menu Name is required',
                    template_id     : 'Template is required',
                    page_id         : 'Page is required',
                    menu_order      : 'Menu Order is required',
                    menu_parent_id  : 'Menu Parent is required',
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
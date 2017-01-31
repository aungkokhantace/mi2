<?php
/**
 * Created by PhpStorm.
 * Author: Wai Yan Aung
 * Date: 10/6/2016
 * Time: 5:43 PM
 */

?>

@extends('layouts.master')
@section('title','Menu Detail')
@section('content')

        <!-- begin #content -->
<div id="content" class="content">

    <h1 class="page-header">{{isset($menudetail) ?  'Menu Detail Edit' : 'Menu Detail Entry' }}</h1>

    @if(isset($menudetail))
        {!! Form::open(array('url' => 'backend/menudetail/update', 'class'=> 'form-horizontal user-form-border', 'id' => 'menudetailForm')) !!}
    @else
        {!! Form::open(array('url' => 'backend/menudetail/store', 'class'=> 'form-horizontal user-form-border', 'id' => 'menudetailForm')) !!}
    @endif
    <input type="hidden" name="id" value="{{isset($menudetail)? $menudetail->id:''}}"/>
    <br/>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="menu" class="text_bold_black">Menu<span class="require">*</span></label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <select class="form-control" name="menu" id="menu">
                @if(isset($menudetail))
                    @foreach($menus as $menu)
                        @if($menu->id == $menudetail->menu_id)
                            <option value="{{$menu->id}}" selected>{{$menu->name}}</option>
                        @else
                            <option value="{{$menu->id}}">{{$menu->name}}</option>
                        @endif
                    @endforeach
                @else
                    <option value="" selected disabled>Select Menu</option>
                    @foreach($menus as $menu)
                        <option value="{{$menu->id}}">{{$menu->name}}</option>
                    @endforeach
                @endif
            </select>
            <p class="text-danger">{{$errors->first('menu')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="page_url" class="text_bold_black">Page URL<span class="require">*</span></label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <input type="text" required class="form-control" id="page_url" name="page_url" placeholder="Enter Page URL" value="{{ isset($menudetail)? $menudetail->page_url:Request::old('page_url') }}"/>
            <p class="text-danger">{{$errors->first('page_url')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="menu_order" class="text_bold_black">Menu Order<span class="require">*</span></label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <select class="form-control" name="menu_order" id="menu_order">
                @if(isset($menudetail))
                    @for ($i = 1; $i <= 100; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                        @if($i == $menudetail->menu_order)
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
            <label for="status" class="text_bold_black">Status</label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <select class="form-control" name="status" id="status">
                @if(isset($menudetail))
                    @if($menudetail->status == "active")
                        <option value="active" selected>Active</option>
                        <option value="inactive">Inactive</option>
                    @else
                        <option value="active">Active</option>
                        <option value="inactive" selected>Inactive</option>
                    @endif
                @else
                    <option value="active" selected>Active</option>
                    <option value="inactive">Inactive</option>
                @endif
            </select>
            <p class="text-danger">{{$errors->first('status')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="menu_group" class="text_bold_black">Menu Group<span class="require">*</span></label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <input type="text" required class="form-control" id="menu_group" name="menu_group" placeholder="Enter Menu Group" value="{{ isset($menudetail)? $menudetail->menu_group:Request::old('menu_group') }}"/>
            <p class="text-danger">{{$errors->first('menu_group')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="menu_group_order" class="text_bold_black">Menu Order<span class="require">*</span></label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <select class="form-control" name="menu_group_order" id="menu_group_order">
                @if(isset($menudetail))
                    @for ($i = 1; $i <= 100; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                        @if($i == $menudetail->menu_order)
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
            <p class="text-danger">{{$errors->first('menu_group_order')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="name" class="text_bold_black">Name<span class="require">*</span></label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <input type="text" required class="form-control" id="name" name="name" placeholder="Enter Name" value="{{ isset($menudetail)? $menudetail->name:Request::old('name') }}"/>
            <p class="text-danger">{{$errors->first('name')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="parent" class="text_bold_black">Parent</label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <select class="form-control" name="parent" id="parent">
                @if(isset($menudetail))
                    <option value="0">None</option>
                    @foreach($menudetails as $detail)
                        @if($detail->id == $menudetail->parent_id)
                            <option value="{{$detail->id}}" selected>{{$detail->name}}</option>
                        @else
                            <option value="{{$detail->id}}">{{$detail->name}}</option>
                        @endif
                    @endforeach
                @else
                    <option value="0">None</option>
                    @foreach($menudetails as $detail)
                        <option value="{{$detail->id}}">{{$detail->name}}</option>
                    @endforeach
                @endif
            </select>
            <p class="text-danger">{{$errors->first('parent')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
            <input type="submit" name="submit" value="{{isset($menudetail)? 'UPDATE' : 'ADD'}}" class="form-control btn-primary">
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
            <input type="button" value="CANCEL" class="form-control cancel_btn" onclick="cancel_setup('menudetail')">
        </div>
    </div>
    {!! Form::close() !!}
</div>
@stop

@section('page_script')
    <script type="text/javascript">
        $(document).ready(function() {
            //Start Validation for Menu Detail Entry and Edit Form
            $('#menudetailForm').validate({
                rules: {
                    menu                  : 'required',
                    page_url              : 'required',
                    menu_order            : 'required',
                    status                : 'required',
                    menu_group            : 'required',
                    menu_group_order      : 'required',
                    name                  : 'required'
                },
                messages: {
                    menu                  : 'Menu is required',
                    page_url              : 'Page URL is required',
                    menu_order            : 'Menu Order is required',
                    status                : 'Status is required',
                    menu_group            : 'Menu Group is required',
                    menu_group_order      : 'Menu Group Order is required',
                    name                  : 'Name is required'
                },
                submitHandler: function(form) {
                    $('input[type="submit"]').attr('disabled','disabled');
                    form.submit();
                }
            });
            //End Validation for Menu Detail Entry and Edit Form

            //For checkbox picker
            $(':checkbox').checkboxpicker();
        });
    </script>
@stop
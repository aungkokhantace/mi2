<?php
/**
 * Created by PhpStorm.
 * Author: Wai Yan Aung
 * Date: 7/25/2016
 * Time: 11:46 AM
 */
?>

@extends('layouts.master')
@section('title','Posts')
@section('content')

        <!-- begin #content -->
<div id="content" class="content">
    <h1 class="page-header">{{ 'New Post' }}</h1>
    @if(count(Session::get('message')) != 0)
        <div>
        </div>
    @endif

    {{--{!! Form::open(array('url' => 'post/store', 'class'=> 'form-horizontal user-form-border','files' => true , 'id' => 'postForm')) !!}--}}

    @if(isset($post))
        {!! Form::open(array('url' => 'backend/post/update', 'class'=> 'form-horizontal user-form-border', 'files' => true , 'id' => 'postForm')) !!}
    @else
        {!! Form::open(array('url' => 'backend/post/store', 'class'=> 'form-horizontal user-form-border', 'files' => true , 'id' => 'postForm')) !!}
    @endif
    <input type="hidden" name="id" value="{{isset($post)? $post->id:''}}"/>
    <br/>

    <br/>

    {{--testing for summernote--}}
    <div class="box-body">
        {{--<div class="form-group">--}}
            {{--{{Form::label('title', 'Title')}}--}}
            {{--{{Form::text('title',null,array('class' => 'form-control', 'placeholder'=>'Title'))}}--}}
        {{--</div>--}}

        {{--Start Title--}}
        <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                <label for="name" class="text_bold_black">Name<span class="require">*</span></label>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" value="{{ isset($post)? $post->title:Request::old('title') }}"/>
                <p class="text-danger">{{$errors->first('title')}}</p>
            </div>
        </div>
        {{--End Title--}}

        {{--<div class="form-group">--}}
            {{--{{Form::label('body', 'Content')}}--}}
            {{--{{Form::textarea('detail',null,array('class' => 'form-control', 'placeholder'=>'Detail', 'id' => 'summernote'))}}--}}
        {{--</div>--}}

        {{--Start Detail--}}
        <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                <label for="description" class="text_bold_black">Detail</label>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                <textarea class="form-control" id="detail" name="detail" placeholder="Enter Detail" rows="5" cols="50">{{ isset($post)? $post->detail:Request::old('detail') }}</textarea>
                <p class="text-danger">{{$errors->first('detail')}}</p>
            </div>
        </div>
        {{--End Detail--}}

        {{--<div class="form-group">--}}
            {{--{{Form::submit('Publish Post',array('class' => 'btn btn-primary btn-sm'))}}--}}
        {{--</div>--}}
        <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                <input type="submit" name="submit" value="{{isset($post)? 'UPDATE' : 'PUBLISH'}}" class="form-control btn-primary">
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                <input type="button" value="CANCEL" class="form-control cancel_btn" onclick="cancel_setup('post')">
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    @stop

    @section('page_script')
        <script type="text/javascript">
            $(document).ready(function() {

                $('#importForm').validate({
                    rules: {
                        table_name: 'required',
                        csv_file : {
                            required: true,
                            extension: "csv"
                        }
                    },
                    messages: {
                        table_name: 'Table Name is required!',
                        csv_file : {
                            required: 'CSV file is required!',
                            extension: 'Please upload a csv file!'
                        }
                    },
                    submitHandler: function(form) {
                        $('input[type="submit"]').attr('disabled','disabled');
                        form.submit();
                    }
                });

                $('#detail').summernote({
                    height:300
                });
            });
        </script>
@stop
<?php
/**
 * Created by PhpStorm.
 * Author: Wai Yan Aung
 * Date: 7/25/2016
 * Time: 11:46 AM
 */
?>

@extends('layouts.master')
@section('title','Post')
@section('content')

        <!-- begin #content -->
<div id="content" class="content">
    <h1 class="page-header">{{isset($post) ?  'Post Edit' : 'Post Entry' }}</h1>


    @if(isset($post))
        {!! Form::open(array('url' => 'backend/post/update', 'class'=> 'form-horizontal user-form-border', 'files' => true , 'id' => 'postForm')) !!}
    @else
        {!! Form::open(array('url' => 'backend/post/store', 'class'=> 'form-horizontal user-form-border', 'files' => true , 'id' => 'postForm')) !!}
    @endif
    <input type="hidden" name="id" value="{{isset($post)? $post->id:''}}"/>
    <br/>

    <br/>

    <div class="box-body">

        <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                <label for="name" class="text_bold_black">Name<span class="require">*</span></label>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="{{ isset($post)? $post->title:Request::old('name') }}"/>
                <p class="text-danger">{{$errors->first('name')}}</p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                <label for="description">Description</label>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <input type="text" class="form-control" id="description" name="description" placeholder="Enter Post Description" value="{{ isset($post)? $post->description:Request::old('description') }}"/>
                <p class="text-danger">{{$errors->first('description')}}</p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                <label for="post_content" class="text_bold_black">Content</label>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                <textarea class="form-control" id="post_content" name="post_content" placeholder="Enter Post Content" rows="5" cols="50">{{ isset($post)? $post->content:Request::old('post_content') }}</textarea>
                <p class="text-danger">{{$errors->first('post_content')}}</p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                <label for="status">Active</label>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">

                @if(isset($post) && $post->status == "active" )
                    <input name="status" type="checkbox" checked="">
                @else
                    <input name="status" type="checkbox">
                @endif
                <p class="text-danger">{{$errors->first('status')}}</p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                <label for="url">Url<span class="require">*</span></label>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <input type="text" class="form-control" id="url" name="url" placeholder="Enter Post Url" value="{{ isset($post)? $post->url:Request::old('url') }}"/>
                <p class="text-danger">{{$errors->first('url')}}</p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                <label for="title">Title<span class="require">*</span></label>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <input type="text" class="form-control" id="title" name="title" placeholder="Enter Post Title" value="{{ isset($post)? $post->title:Request::old('title') }}"/>
                <p class="text-danger">{{$errors->first('title')}}</p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                <label for="post_order">Post Order<span class="require">*</span></label>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <select class="form-control" name="post_order" id="post_order">
                    @if(isset($post))
                        @for ($i = 1; $i <= 100; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                            @if($i == $post->post_order)
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
                <p class="text-danger">{{$errors->first('post_order')}}</p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                <label for="pages_id">Page<span class="require">*</span></label>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <select class="form-control" name="pages_id" id="pages_id">
                    @if(isset($post))
                        @foreach($pages as $page)
                            @if($page->id == $post->pages_id)
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
                <p class="text-danger">{{$errors->first('pages_id')}}</p>
            </div>
        </div>

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

                $('#postForm').validate({
                    rules: {
                        name: 'required',
                        url : 'required',
                        title: 'required',
                        post_order: 'required',
                        pages_id: 'required'
                    },
                    messages: {
                        name: 'Post Name is required',
                        url : 'URL is required',
                        title: 'Post Title is required',
                        post_order: 'Post Order is required',
                        pages_id: 'Page is required'
                    },
                    submitHandler: function(form) {
                        $('input[type="submit"]').attr('disabled','disabled');
                        form.submit();
                    }
                });

//                $('#post_content').summernote({
//                    height:300
//                });

                $('#post_content').summernote({
                    height:300,
                    toolbar: [
                        // [groupName, [list of button]]
                        ['style', ['style']],
                        ['style', ['bold', 'italic', 'underline', 'clear']],
                        ['font', ['strikethrough', 'superscript', 'subscript']],
                        ['fontsize', ['fontsize']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['height', ['height']],
                        ['picture', ['picture']],
                        ['link', ['link']],
                        ['table', ['table']],
                        ['hr', ['hr']],
                        ['codeview', ['codeview']],
                        ['undo', ['undo']],
                        ['redo', ['redo']],
//                        ['help', ['help']],
                    ]
                });

                //For checkbox picker
                $(':checkbox').checkboxpicker();
            });
        </script>
@stop
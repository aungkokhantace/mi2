@extends('layouts.master')
@section('title','Page')
@section('content')

        <!-- begin #content -->
<div id="content" class="content">

    <h1 class="page-header">{{isset($pages) ?  'Page Edit' : 'Page Entry' }}</h1>

    @if(isset($pages))
        {!! Form::open(array('url' => 'backend/page/update', 'class'=> 'form-horizontal user-form-border', 'id' => 'pageForm')) !!}

    @else
        {!! Form::open(array('url' => 'backend/page/store', 'class'=> 'form-horizontal user-form-border', 'id' => 'pageForm')) !!}
    @endif
    <input type="hidden" name="id" value="{{isset($pages)? $pages->id:''}}"/>

    <input type="hidden" name="allow_edit" id="allow_edit" value="{{isset($pages)? $pages->allow_edit:1}}"/>
    <br/>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="name">Name<span class="require">*</span></label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Page Name" value="{{ isset($pages)? $pages->name:Request::old('name') }}"/>
            <p class="text-danger">{{$errors->first('name')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="description">Description</label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <input type="text" class="form-control" id="description" name="description" placeholder="Enter Page Description" value="{{ isset($pages)? $pages->description:Request::old('description') }}"/>
            <p class="text-danger">{{$errors->first('description')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="content">Content</label>
        </div>
        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
            {{--<input type="text" class="form-control" id="content" name="content" placeholder="Enter Page Content" value="{{ isset($pages)? $pages->content:Request::old('content') }}"/>--}}
            <textarea class="form-control" id="page_content" name="content" placeholder="Enter Page Content" rows="5" cols="50">{{ isset($pages)? $pages->content:Request::old('content') }}</textarea>
            <p class="text-danger">{{$errors->first('content')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="status">Active</label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            
            @if(isset($pages) && $pages->status == "active" )
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
            <input type="text" class="form-control" id="url" name="url" placeholder="Enter Page Url" value="{{ isset($pages)? $pages->url:Request::old('url') }}"/>
            <p class="text-danger">{{$errors->first('url')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="title">Title<span class="require">*</span></label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <input type="text" class="form-control" id="title" name="title" placeholder="Enter Page Title" value="{{ isset($pages)? $pages->title:Request::old('title') }}"/>
            <p class="text-danger">{{$errors->first('title')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="page_menu_order">Page Menu Order<span class="require">*</span></label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            {{--<input type="text" class="form-control" id="page_menu_order" name="page_menu_order" placeholder="Enter Page Menu Order" value="{{ isset($pages)? $pages->page_menu_order:Request::old('page_menu_order') }}"/>--}}
            <select class="form-control" name="page_menu_order" id="page_menu_order">
                @if(isset($pages))
                    @for ($i = 1; $i <= 100; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                        @if($i == $pages->page_menu_order)
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
            <p class="text-danger">{{$errors->first('page_menu_order')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="events_id">Event<span class="require">*</span></label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            {{--<input type="text" class="form-control" id="events_id" name="events_id" placeholder="Enter Page Event Id" value="{{ isset($pages)? $pages->events_id:Request::old('events_id') }}"/>--}}
            <select class="form-control" name="events_id" id="events_id">
                @if(isset($pages))
                    @foreach($events as $event)
                        @if($event->id == $pages->events_id)
                            <option value="{{$event->id}}" selected>{{$event->name}}</option>
                        @else
                            <option value="{{$event->id}}">{{$event->name}}</option>
                        @endif
                    @endforeach
                @else
                    <option value="" selected disabled>Select Event</option>
                    @foreach($events as $event)
                        <option value="{{$event->id}}">{{$event->name}}</option>
                    @endforeach
                @endif
            </select>
            <p class="text-danger">{{$errors->first('events_id')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="templates_id">Template<span class="require">*</span></label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            {{--<input type="text" class="form-control" id="templates_id" name="templates_id" placeholder="Enter Page Template Id" value="{{ isset($pages)? $pages->templates_id:Request::old('templates_id') }}"/>--}}
            <select class="form-control" name="templates_id" id="templates_id">
                @if(isset($pages))
                    @foreach($templates as $template)
                        @if($template->id == $pages->templates_id)
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
            <p class="text-danger">{{$errors->first('templates_id')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="status">Allow Edit</label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            @if(isset($pages) && $pages->allow_edit == 1 )
                <input name="allow_edit" type="checkbox" checked="">
            @else
                <input name="allow_edit" type="checkbox">
            @endif

        </div>
    </div>

    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
            <input type="submit" name="submit" value="{{isset($pages)? 'UPDATE' : 'ADD'}}" class="form-control btn-primary">
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
            <input type="button" value="CANCEL" class="form-control cancel_btn" onclick="cancel_setup('page')">
        </div>
    </div>
    {!! Form::close() !!}
</div>
@stop

@section('page_script')
    <script type="text/javascript">
        $(document).ready(function() {
            //Start Validation for Menu Entry and Edit Form
            $('#pageForm').validate({
                rules: {
                    name                  : 'required',
                    url                   : 'required',
                    title                 : 'required',
                    page_menu_order       : 'required',
                    events_id             : 'required',
                    templates_id          : 'required',
                },
                messages: {
                    name                  : 'Page Name is required',
                    url                   : 'Page URL is required',
                    title                 : 'Page Title is required',
                    page_menu_order       : 'Page Menu Order is required',
                    events_id             : 'Event is required',
                    templates_id          : 'Template is required',
                },
                submitHandler: function(form) {
                    $('input[type="submit"]').attr('disabled','disabled');
                    form.submit();
                }
            });
            //End Validation for Menu Entry and Edit Form

            //For checkbox picker
            $(':checkbox').checkboxpicker();

            //For Text Editor
//            $('#page_content').summernote({
//                height:400
//            });

            $('#page_content').summernote({
                height:300,
                toolbar: [
                    // [groupName, [list of button]]
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
                    ['help', ['help']],
                ]
            });

            var editable_flag = document.getElementById('allow_edit').value;

            // To disable
            if(editable_flag == 0){
                $('#page_content').summernote('disable');
            }

            // param {String} fontName
            $('#page_content').summernote('fontName', 'Zawgyi-One');

            // param {Number} font size - unit is px
            $('#page_content').summernote('fontSize', 11);

        });
    </script>
@stop
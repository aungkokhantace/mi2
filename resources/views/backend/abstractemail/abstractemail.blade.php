@extends('layouts.master')
@section('title','Abstract Email')
@section('content')

        <!-- begin #content -->
<div id="content" class="content">

    <h1 class="page-header">Abstract Email Edit</h1>
    {!! Form::open(array('url' => '/backend/abstractemail', 'class'=> 'form-horizontal user-form-border','files' => true)) !!}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="description" class="text_bold_black">Abstract Email Body</label>
        </div>
        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
            <textarea class="form-control" id="description" name="description" placeholder="Enter Email Body" rows="5" cols="50">{{ isset($abstractemail)? $abstractemail["description"]:Request::old('description') }}</textarea>
            <p class="text-danger">{{$errors->first('description')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
            <input type="submit" name="submit" value="{{isset($abstractemail)? 'UPDATE' : 'ADD'}}" class="form-control btn-primary">
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
            <input type="button" value="CANCEL" class="form-control cancel_btn" onclick="cancel_setup('abstractemail')">
        </div>
    </div>
    {!! Form::close() !!}
</div>
@stop

@section('page_script')
<script>
    $(document).ready(function() {
        $('#description').summernote({
            height:300
        });
    });

    function saveConfig(action) {
        var rate = $("#SETTING_TAXRATE").val();
        $("#error_lbl_SETTING_TAXRATE").text("");
        var errorCount = 0;
        if(isNaN(rate)){
            $("#error_lbl_SETTING_TAXRATE").text("Invalid Tax Rate !. It allow Number only !");
            errorCount++;
        }

        if(errorCount>0) {
            return;
        }
        else{
            $("#backend_posconfigs").submit();
        }
    }

</script>
@stop
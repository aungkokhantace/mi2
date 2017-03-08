@extends('layouts.master')
@section('title','Abstract Reject Admin Email')
@section('content')

        <!-- begin #content -->
<div id="content" class="content">

    <h1 class="page-header">Abstract Reject Admin Email Edit</h1>
    {!! Form::open(array('url' => '/backend/abstract_reject_admin_email', 'class'=> 'form-horizontal user-form-border','files' => true)) !!}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="description" class="text_bold_black">Email Body</label>
        </div>
        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
            <textarea class="form-control" id="description" name="description" placeholder="Enter Email Body" rows="5" cols="50">{{ isset($abstractrejectadminemail)? $abstractrejectadminemail["description"]:Request::old('description') }}</textarea>
            <p class="text-danger">{{$errors->first('description')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
            <input type="submit" name="submit" value="{{isset($abstractrejectadminemail)? 'UPDATE' : 'ADD'}}" class="form-control btn-primary">
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
            <input type="button" value="CANCEL" class="form-control cancel_btn" onclick="cancel_setup('abstract_reject_admin_email')">
        </div>
    </div>
    {!! Form::close() !!}
</div>
@stop

@section('page_script')
<script>
    $(document).ready(function() {
//        $('#description').summernote({
//            fontSizes: ['8', '9', '10', '11', '12', '14', '18', '24', '36', '48' , '64', '82', '150'],
//            height:300,
//        });

        $('#description').summernote({
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
//                ['help', ['help']],
            ]
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
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

    <h1 class="page-header">{{'Abstractform Update'  }}</h1>

    {!! Form::open(array('url' => 'backend/abstractform/update', 'class'=> 'form-horizontal user-form-border', 'files'=> 'true')) !!}

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
            <label for="email">Email</label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" value="{{ isset($abstractforms)? $abstractforms->email:Request::old('email') }}"/>
            <p class="text-danger">{{$errors->first('email')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="country">Country</label>
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

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label for="medical_specialities">Medication Specialities</label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <input type="text" class="form-control" id="medical_specialities" name="medical_specialities" placeholder="Enter Medical Specialities" value="{{ isset($abstractforms)? $abstractforms->medical_specialities:Request::old('medical_specialities') }}"/>
            <p class="text-danger">{{$errors->first('medical_specialities')}}</p>
        </div>
    </div>

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
            @if(isset($abstractforms) && $abstractforms->status != "confirm")
                <input type="submit" name="submit" value="{{'CONFIRM'}}" class="form-control btn-primary">
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

            $('#list-table tfoot th.search-col').each( function () {
                var title = $('#list-table thead th').eq( $(this).index() ).text();
                $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
            } );

            var table = $('#list-table').DataTable({
                aLengthMenu: [
                    [5,25, 50, 100, 200, -1],
                    [5,25, 50, 100, 200, "All"]
                ],
                iDisplayLength: 5,
                "order": [[ 2, "desc" ]],
                stateSave: false,
                "pagingType": "full",
                "dom": '<"pull-right m-t-20"i>rt<"bottom"lp><"clear">',

            });
//            new $.fn.dataTable.FixedHeader( table, {
//            });


            // Apply the search
            table.columns().eq( 0 ).each( function ( colIdx ) {
                $( 'input', table.column( colIdx ).footer() ).on( 'keyup change', function () {
                    table
                            .column( colIdx )
                            .search( this.value )
                            .draw();
                } );

            });
        });
    </script>
@stop
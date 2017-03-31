@extends('layouts.master')
@section('title','System Reference')
@section('content')

        <!-- begin #content -->
<div id="content" class="content">

    <h1 class="page-header">Title</h1>

    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <table border="1" width="50%" class="table table-bordered table-responsive table-striped">
                <thead>
                    <tr>
                        <th width="50%"><b>Name</b></th>
                        <th width="50%"><b>Value</b></th>
                    </tr>
                </thead>
                <tr>
                    <td>Dr.</td>
                    <td>1</td>
                </tr>
                <tr>
                    <td>Professor</td>
                    <td>2</td>
                </tr>
                <tr>
                    <td>Mr.</td>
                    <td>3</td>
                </tr>
                <tr>
                    <td>Mrs.</td>
                    <td>4</td>
                </tr>
                <tr>
                    <td>Ms.</td>
                    <td>5</td>
                </tr>
            </table>
        </div>
    </div>
    <hr>

    <h1 class="page-header">Email Category</h1>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <table border="1" width="50%" class="table table-bordered table-responsive table-striped">
                <thead>
                <tr>
                    <th width="50%"><b>Name</b></th>
                    <th width="50%"><b>Value</b></th>
                </tr>
                </thead>
                <tr>
                    <td>Abstract</td>
                    <td>1</td>
                </tr>
                <tr>
                    <td>Register</td>
                    <td>2</td>
                </tr>
                <tr>
                    <td>Super-admin</td>
                    <td>3</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@stop

@section('page_script')
<script>
    $(document).ready(function() {

    });
</script>
@stop
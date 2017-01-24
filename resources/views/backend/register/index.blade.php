@extends('layouts.master')
@section('title','Register')
@section('content')

        <!-- begin #content -->
<div id="content" class="content">

    <h1 class="page-header">Registration Form</h1>

    <div class="row">
        <div class="col-md-10"></div>
        <div class="col-md-2 pull-right">
            <div class="buttons pull-right">
                <button type="button" onclick='edit_setup("register");' class="btn btn-default btn-md second_btn">
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                </button>
                <button type="button" onclick="delete_setup('register');" class="btn btn-default btn-md third_btn">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </button>
            </div>
        </div>

    </div>

    {!! Form::open(array('id'=> 'frm_register' ,'url' => 'backend/register/destroy', 'class'=> 'form-horizontal user-form-border')) !!}
    {{ csrf_field() }}
    <input type="hidden" id="selected_checkboxes" name="selected_checkboxes" value="">


    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="listing">
                <input type="hidden" id="pageSearchedValue" name="pageSearchedValue" value="">
                <table class="table table-striped list-table" id="list-table">

                    <thead>
                    <tr>
                        <th><input type='checkbox' name='check' id='check_all'/></th>
                        <th>First_name</th>
                        <th>Middle_name</th>
                        <th>Last_name</th>
                        <th>Title</th>
                        <th>Email</th>
                        <th>Country</th>
                        <th>Where you work?</th>
                        <th>Medication Specialities</th>
                        <th>Phone no</th>
                        <th>Registration Category</th>
                        <th>Payment Type</th>

                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th></th>
                        <th class="search-col" con-id="first_name">First_name</th>
                        <th class="search-col" con-id="middle_name">Middle Name</th>
                        <th class="search-col" con-id="last_name">Last Name</th>
                        <th class="search-col" con-id="title">Title</th>
                        <th class="search-col" con-id="email">Email</th>
                        <th class="search-col" con-id="country">Country</th>
                        <th class="search-col" con-id="where_work">Where you work?</th>
                        <th class="search-col" con-id="medical_specialities">Medication Specialities</th>
                        <th class="search-col" con-id="phone_no">Phone No</th>
                        <th class="search-col" con-id="registration_category">Registration Category</th>
                        <th class="search-col" con-id="payment_type">Payment Type</th>
                        <th></th>


                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($registers as $register)
                        <tr>
                            <td><input type="checkbox" class="check_source" name="edit_check" value="{{ $register->id }}" id="all"></td>
                            <td><a href="/backend/register/edit/{{$register->id}}">{{$register->first_name}}</a></td>
                            <td>{{$register->middle_name}}</td>
                            <td>{{$register->last_name}}</td>
                            <td>{{$register->title}}</td>
                            <td>{{$register->email}}</td>
                            <td>{{$register->country_name}}</td>
                            <td>{{$register->where_work}}</td>
                            <td>{{$register->medical_specialities}}</td>
                            <td>{{$register->phone_no}}</td>
                            <td>{{$register->registration_category}}</td>
                            <td>{{$register->payment_type}}</td>
                            <td><a href="registerPermission/{{$register->id}}">Edit Permissions</a></td>
                            <td>
                                @if($register->status == 'confirm')
                                    {{'CONFIRM'}}
                                @else
                                    <button type="button" onclick="register_status_confirm('{{$register->id}}');" class="btn btn-primary">
                                        CONFIRM
                                    </button>
                                @endif
                            </td>    
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
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
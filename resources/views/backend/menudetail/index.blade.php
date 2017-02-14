@extends('layouts.master')
@section('title','Menu Detail')
@section('content')

        <!-- begin #content -->
<div id="content" class="content" style="overflow: auto;">

    <h1 class="page-header">Menu Detail List</h1>
    @if(count(Session::get('message')) != 0)
        <div>
        </div>
    @endif

    <div class="row">
        <div class="col-md-10"></div>
        <div class="col-md-2">
            <div class="buttons pull-right">
                <button type="button" onclick='create_setup("menudetail");' class="btn btn-default btn-md first_btn">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </button>
                <button type="button" onclick='edit_setup("menudetail");' class="btn btn-default btn-md second_btn">
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                </button>
                <button type="button" onclick='delete_setup("menudetail");' class="btn btn-default btn-md third_btn">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </button>
            </div>
        </div>

    </div>

    {!! Form::open(array('id'=> 'frm_menudetail' ,'url' => 'backend/menudetail/destroy', 'class'=> 'form-horizontal user-form-border')) !!}
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
                        <th>Name</th>
                        <th>Menu</th>
                        <th>Page URL</th>
                        <th>Menu Order</th>
                        <th>Status</th>
                        <th>Menu Group</th>
                        <th>Menu Group Order</th>
                        <th>Parent</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th></th>
                        <th class="search-col" con-id="name">Name</th>
                        <th class="search-col" con-id="menu">Menu</th>
                        <th class="search-col" con-id="page_url">Page URL</th>
                        <th class="search-col" con-id="menu_order">Menu Order</th>
                        <th class="search-col" con-id="status">Status</th>
                        <th class="search-col" con-id="menu_group">Menu Group</th>
                        <th class="search-col" con-id="menu_group_order">Menu Group Order</th>
                        <th class="search-col" con-id="parent_id">Parent</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($menudetails as $menudetail)
                        <tr>
                            <td><input type="checkbox" class="check_source" name="edit_check" value="{{ $menudetail->id }}" id="all"></td>
                            <td><a href="/backend/menudetail/edit/{{$menudetail->id}}">{{$menudetail->name}}</a></td>
                            <td>{{$menudetail->menu->name}}</td>
                            <td>{{$menudetail->page->url}}</td>
                            <td>{{$menudetail->menu_order}}</td>
                            <td>{{$menudetail->status}}</td>
                            <td>{{$menudetail->menu_group}}</td>
                            <td>{{$menudetail->menu_group_order}}</td>
                            @if($menudetail->parent_id == 0)
                                <td>None</td>
                            @else
                                <td>{{$menudetail->parent->name}}</td>
                            @endif
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
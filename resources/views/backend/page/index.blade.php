@extends('layouts.master')
@section('title','Page')
@section('content')

        <!-- begin #content -->
<div id="content" class="content">

    <h1 class="page-header">Page Listing</h1>

    <div class="row">
        <div class="col-md-10"></div>
        <div class="col-md-2 pull-right">
            <div class="buttons pull-right">
                <button type="button" onclick='create_setup("page");' class="btn btn-default btn-md first_btn">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </button>
                <button type="button" onclick='edit_setup("page");' class="btn btn-default btn-md second_btn">
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                </button>
                <button type="button" onclick="delete_setup('page');" class="btn btn-default btn-md third_btn">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </button>
            </div>
        </div>

    </div>

    {!! Form::open(array('id'=> 'frm_page' ,'url' => 'backend/page/destroy', 'class'=> 'form-horizontal user-form-border')) !!}
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
                        <th>Description</th>
                        <th>Content</th>
                        <th>Status</th>
                        <th>Url</th>
                        <th>Title</th>
                        <th>Page Menu Order</th>
                        <th>Event</th>
                        <th>Template</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th></th>
                        <th class="search-col" con-id="name">Name</th>
                        <th class="search-col" con-id="description">Description</th>
                        <th class="search-col" con-id="content">Content</th>
                        <th class="search-col" con-id="status">Status</th>
                        <th class="search-col" con-id="url">Url</th>
                        <th class="search-col" con-id="title">Title</th>
                        <th class="search-col" con-id="page_menu_order">Page Menu Order</th>
                        <th class="search-col" con-id="events_id">Event</th>
                        <th class="search-col" con-id="templates_id">Template</th>
                        <th></th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($pages as $page)
                        <tr>
                            <td><input type="checkbox" class="check_source" name="edit_check" value="{{ $page->id }}" id="all"></td>
                            <td><a href="/backend/page/edit/{{$page->id}}">{{$page->name}}</a></td>
                            <td>{{$page->description}}</td>
                            <td>{{$page->content}}</td>
                            <td>{{$page->status}}</td>
                            <td>{{$page->url}}</td>
                            <td>{{$page->title}}</td>
                            <td>{{$page->page_menu_order}}</td>
                            <td>{{$page->event->name}}</td>
                            <td>{{$page->template->name}}</td>
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
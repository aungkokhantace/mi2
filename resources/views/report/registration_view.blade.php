@extends('layouts.master')
@section('title','Sale Summary Report')
@section('content')

        <!-- begin #content -->
<div id="content" class="content">

    <h1 class="page-header">Event Registration Report</h1>
    @if(count(Session::get('message')) != 0)
        <div>
        </div>
    @endif
    <br />

    <div class="row">
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
            <label for="from_date" class="text_bold_black">From Date</label>
        </div>

        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <div class="input-group date dateTimePicker" data-provide="datepicker" id="datepicker_from">
                <input type="text" class="form-control" id="from_date" name="from_date" value="{{isset($from_date)? $from_date : ''}}">
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </div>
            </div>
            <p class="text-danger">{{$errors->first('from_date')}}</p>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>

        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
            <label for="to_date" class="text_bold_black">To Date</label>
        </div>

        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <div class="input-group date dateTimePicker" data-provide="datepicker"  id="datepicker_to">
                <input type="text" class="form-control" id="to_date" name="date" value="{{isset($to_date)? $to_date : ''}}">
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </div>
            </div>
            <p class="text-danger">{{$errors->first('to_date')}}</p>
        </div>

        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
        
    </div>
    <br>
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <button type="button" onclick="report_search_by_date('backend/report/registration');" class="form-control btn-primary">Preview</button>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <button type="button" onclick="report_export('backend/report/registration');" class="form-control btn-primary">Export Excel</button>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            {{--<a target="_blank" href="/backend/report/registration/export"><button class="form-control btn btn-primary">Print</button></a>--}}
            <button type="button" onclick="report_pdf_export('backend/report/registration');" class="form-control btn btn-primary">Print</button>
        </div>
    </div>      

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="listing">
                <input type="hidden" id="pageSearchedValue" name="pageSearchedValue" value="">
                <table class="table list-table" id="list-table">
                    <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Country</th>
                        {{--<th>Working Place</th>--}}
                        <th>Total Amount</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th class="search-col" con-id="">First Name</th>
                        <th class="search-col" con-id="">Middle Name</th>
                        <th class="search-col" con-id="">Last Name</th>
                        <th class="search-col" con-id="">Email</th>
                        <th class="search-col" con-id="">Country</th>
                        {{--<th class="search-col" con-id="">Working Place</th>--}}
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($eventRegistrations as $eventRegistration)
                        <tr>
                            <td>{{$eventRegistration->first_name}}</td>
                            <td>{{$eventRegistration->middle_name}}</td>
                            <td>{{$eventRegistration->last_name}}</td>
                            <td>{{$eventRegistration->email}}</td>
                            <td>{{$eventRegistration->country}}</td>
                            {{--<td>{{$eventRegistration->where_work}}</td>--}}
                            <td></td>

                        </tr>
                    @endforeach
                    <tr bgcolor="#1976d3">
                        <td style = "color:white">Grand Total</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        {{--<td></td>--}}
                        <td></td>
                        <td align="right" style = "color:white">{{$grandTotal}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

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
                "paging":   false,
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

            $('#datepicker_from').datepicker({
                format: 'dd-mm-yyyy',
                autoclose: true,
                defaultDate: "+1w",
                changeMonth: true,
                numberOfMonths: 1,
                allowInputToggle: true,
            });

            $('#datepicker_to').datepicker({
                format: 'dd-mm-yyyy',
                autoclose: true,
                defaultDate: "+1w",
                changeMonth: true,
                numberOfMonths: 1,
                allowInputToggle: true,
                minDate: "20-08-2016",

            });
        });
    </script>
@stop
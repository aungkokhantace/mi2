<?php
$headerMenuFlag = \App\Core\Check::headerMenuFlag();
$headerMenus = \App\Core\Check::getHeaderMenus();
$companyLogo = \App\Core\Check::companyLogo();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Myanmar Internal Medicine Society</title>
    <link rel="shortcut icon" href="{{$companyLogo}}"/>
    <!-- Bootstrap Core CSS -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/assets/css/blog-home.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    {{--js and css--}}
    <link href="/assets/css/AdminLTE.css" rel="stylesheet">
    <link media="all" type="text/css" rel="stylesheet" href="/assets/plugins/bootstrap-datepicker/css/datepicker3.css">
    <link media="all" type="text/css" rel="stylesheet" href="/assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.css">
    <link media="all" type="text/css" rel="stylesheet" href="/assets/js/datepicker/datepicker3.css">
    <link media="all" type="text/css" rel="stylesheet" href="/assets/css/fullcalendar.css">
    <link media="all" type="text/css" rel="stylesheet" href="/assets/css/sweetalert.css">
    <link media="all" type="text/css" rel="stylesheet" href="/assets/css/multiple-select.css">
    <link media="all" type="text/css" rel="stylesheet" href="/assets/css/jktCuteDropdown.css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link media="all" type="text/css" rel="stylesheet" href="/assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css">
    <link media="all" type="text/css" rel="stylesheet" href="/assets/plugins/bootstrap/css/bootstrap.min.css">
    <link media="all" type="text/css" rel="stylesheet" href="/assets/plugins/font-awesome/css/font-awesome.min.css">
    <link media="all" type="text/css" rel="stylesheet" href="/assets/css/animate.min.css">
    <link media="all" type="text/css" rel="stylesheet" href="/assets/css/style.min.css">
    <link media="all" type="text/css" rel="stylesheet" href="/assets/css/style-custom.css">
    <link media="all" type="text/css" rel="stylesheet" href="/assets/css/plugin-prism.css">
    <link media="all" type="text/css" rel="stylesheet" href="/assets/css/style-responsive.min.css">
    <link media="all" type="text/css" rel="stylesheet" href="/assets/css/theme/default.css">
    <link media="all" type="text/css" rel="stylesheet" href="/assets/plugins/ionicons/css/ionicons.min.css">
    <link media="all" type="text/css" rel="stylesheet" href="/assets/plugins/DataTables/css/data-table.css">
    <link media="all" type="text/css" rel="stylesheet" href="/assets/plugins/gritter/css/jquery.gritter.css">
    <link media="all" type="text/css" rel="stylesheet" href="/assets/plugins/footable/footable.core.min.css">
    <link media="all" type="text/css" rel="stylesheet" href="/assets/plugins/footable/footable.metro.css">
    <link media="all" type="text/css" rel="stylesheet" href="/assets/plugins/switchery/switchery.min.css">
    <link media="all" type="text/css" rel="stylesheet" href="/assets/plugins/powerange/powerange.min.css">
    <link media="all" type="text/css" rel="stylesheet" href="/assets/plugins/jasny/css/jasny-bootstrap.css">
    <link media="all" type="text/css" rel="stylesheet" href="/assets/css/custom.css">
    <link media="all" type="text/css" rel="stylesheet" href="/assets/css/style-edit-navbar.css">

    {{--For summernote editor--}}
    <link rel="stylesheet" href="/assets/plugins/summernote/summernote.css" type="text/css" media="all" />

    <script src="/assets/js/jquery.js"></script>
    <script src="/assets/js/apps.min.js"></script>
    <script src="/assets/plugins/jquery/jquery-1.9.1.min.js"></script>
    {{--<script src="/assets/plugins/bootstrap/js/bootstrap.min.js"></script>--}}
    <script src="/assets/plugins/jquery-cookie/jquery.cookie.js"></script>
    <script src="/assets/js/jquery-2.1.3.min.js"></script>
    {{--<script src="/assets/js/bootstrap.min.js"></script>--}}
    {{--<script src="/assets/plugins/pace/pace.min.js"></script>--}}
    <script src="/assets/plugins/jquery/jquery-1.9.1.min.js"></script>
    <script src="/assets/plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
    <script src="/assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
    {{--<script src="/assets/plugins/bootstrap/js/bootstrap.min.js"></script>--}}
    <script src="/assets/plugins/jquery-cookie/jquery.cookie.js"></script>
    <script src="/assets/plugins/DataTables/js/jquery.dataTables.js"></script>
    <script src="/assets/plugins/DataTables/js/dataTables.tableTools.js"></script>
    <script src="/assets/plugins/DataTables/js/dataTables.fixedHeader.js"></script>
    <script src="/assets/js/table-manage-tabletools.demo.min.js"></script>
    <script src="/assets/plugins/gritter/js/jquery.gritter.js"></script>
    <script src="/assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="/assets/plugins/jasny/js/jasny-bootstrap.js"></script>
    <script src="/assets/plugins/footable/footable.all.min.js"></script>
    <script src="/assets/plugins/switchery/switchery.min.js"></script>
    <script src="/assets/plugins/switchery/switchery_function.js"></script>
    <script src="/assets/plugins/summernote/summernote.min.js"></script>  {{--For summernote editor--}}
    <script src="/assets/plugins/bootstrap-checkbox-1.4.0/js/bootstrap-checkbox.js"></script>{{--For checkbox picker--}}
    <script src="/assets/js/aceplus.backend.functions.js"></script>
    <script src="/assets/js/backend.js"></script>


    <script>
        $(document).ready(function() {
            App.init();
            TableManageTableTools.init();

            //check for notification
                    @if(Session::has('message'))
                        var message_title = "{{Session::get('message')['title']}}";
            var message_body = "{{Session::get('message')['body']}}";
            setTimeout(addNotification(message_title, message_body), 5000);
            @endif

            //set time out for the flash message..
            setTimeout(function(){
                $('#flash-message').hide("slow");
            }, 2000);
        });
    </script>


    <script src="/assets/js/validation/validation.js"></script>
    <script src="/assets/js/jktCuteDropdown.min.js"></script>
    <script src="/assets/js/datepicker/bootstrap-datepicker.js"></script>
    <script src="/assets/js/combodate.js"></script>
    <script src="/assets/js/amcharts.min.js"></script>
    <script src="/assets/js/serial.min.js"></script>
    <script src="/assets/js/light.min.js"></script>
    <script src="/assets/js/crud.js"></script>
    <script src="/assets/js/checkbox.js"></script>
    <script src="/assets/js/sweetalert-dev.js"></script>
    <script src="/assets/js/dropdown-checkbox.js"></script>
    <script src="/assets/js/moment.min.js"></script>
    <script src="/assets/js/custom.min.js"></script>
    <script src="/assets/js/fileupload.js"></script>
    <script src="/assets/js/validation/jquery.validate.js"></script>
    <script src="/assets/js/validation/validation.js"></script>
    <script src="/assets/js/date.js"></script>

    {{--js and css--}}

    <!-- Bootstrap Core CSS -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/assets/css/blog-home.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<!-- Navigation -->
<section class="header">
    <div class="container">
        <img src="/images/logo.png" class="hlogo">
        <span class="htext">Myanmar Internal Medicine Society</span>
    </div>
</section>

@if($headerMenuFlag == 'on')
    <div class="row">

        <div id="navbar">
            <nav class="navbar navbar-default navbar-static-top" role="navigation">
                <div class="collapse navbar-collapse" id="navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        {!! generateMainTree($headerMenus) !!}
                    </ul>
                </div>
            </nav>

        </div>
        {{--Multilevel Nav Bar--}}
    </div>
@endif
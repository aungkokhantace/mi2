<?php
$headerMenuFlag = \App\Core\Check::headerMenuFlag();
$footerMenus = \App\Core\Check::getFooterMenus();

?>

        <!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright &copy; IMS All Right Reserved 2017</p>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        {{--Footer Menus--}}
        <div class="row">
            {{--<div class="col-md-12">--}}
                {{--<ol class="breadcrumb foot">--}}
                    {{--@foreach($footerMenus as $footerMenu)--}}
                        {{--<li><a href="#">{{$footerMenu->name}}</a></li>--}}
                    {{--@endforeach--}}
                {{--</ol>--}}
            {{--</div>--}}
            {{--Multilevel Nav Bar--}}
            <div id="navbar">
                <nav class="navbar navbar-default navbar-static-top" role="navigation">
                    <div class="collapse navbar-collapse" id="navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            {!! generateMainTree($footerMenus) !!}
                        </ul>
                    </div>
                </nav>

            </div>
            {{--Multilevel Nav Bar--}}
        </div>
        {{--Footer Menus--}}
    </div>
</footer>

<!-- jQuery -->
<script src="/assets/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="/assets/js/bootstrap.min.js"></script>

</body>

</html>

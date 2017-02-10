<?php
$footerMenuFlag = \App\Core\Check::footerMenuFlag();
$footerMenus = \App\Core\Check::getFooterMenus();
?>

    <!-- Div within Container End and will start in sidemenu.blade page -->
    </div>
<!-- Container End and will start in sidemenu.blade page -->
</div>

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
    </div>

    @if($footerMenuFlag == 'on')
    {{--Footer Menus--}}

        <div id="navbar">
            <nav class="navbar navbar-default navbar-static-top" role="navigation">
                <div class="collapse navbar-collapse" id="navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        {!! generateMainTree($footerMenus) !!}
                    </ul>
                </div>
            </nav>
        </div>

    @endif
    {{--Footer Menus--}}

</footer>
<!-- jQuery -->
<script src="/assets/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="/assets/js/bootstrap.min.js"></script>


</body>

</html>

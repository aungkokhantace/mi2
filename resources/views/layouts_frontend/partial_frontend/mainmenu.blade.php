<?php
$headerMenuFlag = \App\Core\Check::headerMenuFlag();
$mainMenus = \App\Core\Check::getMainMenus();
?>

<section class="header-menu">
    <div class="container">
        <nav class="navbar navbar-default">
            <!--  <div class="container-fluid"> -->
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <div id="navbar">
                <nav class="navbar navbar-default navbar-static-top" role="navigation">
                    <div class="collapse navbar-collapse" id="navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            {!! generateMainTree($mainMenus) !!}
                        </ul>
                    </div>
                </nav>

            </div>
        </nav>
    </div>

</section>
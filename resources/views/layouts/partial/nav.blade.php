<!-- begin #sidebar -->
<div id="sidebar" class="sidebar">
    <!-- begin sidebar scrollbar -->
    <div data-scrollbar="true" data-height="100%">
        <!-- begin sidebar nav -->
        <ul class="nav">
            <!-- begin sidebar minify button -->
            <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
            <!-- end sidebar minify button -->
            <li class="nav-header">AcePlus Reports</li>
            <li nav-id='report'  class="has-sub" >
                <a href="javascript:;">
                    <b class="caret pull-right"></b>
                    <i class="fa fa-calendar"></i>
                    <span>Reports</span>
                </a>

                <ul class="sub-menu">
                    <li nav-id="report-event-register"><a href="/backend/report/registration">Event Registrations</a></li>
                    <li nav-id="report-event-abstraact"><a href="/backend/report/abstract">Event Abstracts</a></li>
                </ul>
            </li>


            <li class="nav-header">AcePlus Backend</li>

            <li nav-id="menu-manage" class="has-sub">
                <a href="javascript:;">
                    <b class="caret pull-right"></b>
                    <i class="fa fa-asterisk"></i>
                    <span>Menu Setup</span>
                </a>

                <ul class="sub-menu">
                    <li nav-id="menu-manage" class="has-sub">
                        <a href="javascript:;">
                            <b class="caret pull-right"></b>
                            <span>Menu</span>
                        </a>
                        <ul class="sub-menu">
                            <li nav-id="menu-entry"><a href="/backend/menu/create">Entry</a></li>
                            <li nav-id="menu-list"><a href="/backend/menu">List</a></li>
                        </ul>
                    </li>
                    <li nav-id="menu-manage" class="has-sub">
                        <a href="javascript:;">
                            <b class="caret pull-right"></b>
                            <span>Menu Detail</span>
                        </a>
                        <ul class="sub-menu">
                            <li nav-id="menu-entry"><a href="/backend/menudetail/create">Entry</a></li>
                            <li nav-id="menu-list"><a href="/backend/menudetail">List</a></li>
                        </ul>
                    </li>
                </ul>
            </li>

            <li nav-id="menu-manage" class="has-sub">
                <a href="javascript:;">
                    <b class="caret pull-right"></b>
                    <i class="fa fa-asterisk"></i>
                    <span>Template Setup</span>
                </a>

                <ul class="sub-menu">
                    <li nav-id="menu-manage" class="has-sub">
                        <a href="javascript:;">
                            <b class="caret pull-right"></b>
                            <span>Template</span>
                        </a>
                        <ul class="sub-menu">
                            <li nav-id="menu-entry"><a href="/backend/template/create">Entry</a></li>
                            <li nav-id="menu-list"><a href="/backend/template">List</a></li>
                        </ul>
                    </li>
                    <li nav-id="menu-manage" class="has-sub">
                        <a href="javascript:;">
                            <b class="caret pull-right"></b>
                            <span>Template Sidebar Menu</span>
                        </a>
                        <ul class="sub-menu">
                            <li nav-id="menu-entry"><a href="/backend/templatesidebarmenu/create">Entry</a></li>
                            <li nav-id="menu-list"><a href="/backend/templatesidebarmenu">List</a></li>
                        </ul>
                    </li>
                </ul>
            </li>

            <li nav-id='profile'  class="has-sub" >
                <a href="javascript:;">
                    <b class="caret pull-right"></b>
                    <i class="fa fa-image"></i>
                    <span>Slider Setup</span>
                </a>
                <ul class="sub-menu">
                    <li nav-id='slider'  class="has-sub" >
                        <a href="javascript:;">
                            <b class="caret pull-right"></b>
                            <span>Slider</span>
                        </a>
                        <ul class="sub-menu">
                            <li nav-id="modifier-manage-modifierpanel"><a href="/backend/templateslider/create">Entry</a></li>
                            <li nav-id="modifier-manage-modifierpanel"><a href="/backend/templateslider">List</a></li>
                        </ul>
                    </li>
                </ul>
            </li>

            <li  nav-id='modifier'  class="has-sub">
                <a href="javascript:;">
                    <b class="caret pull-right"></b>
                    <i class="fa fa-users"></i>
                    <span>Site Setup</span>
                </a>
                <ul class="sub-menu">
                    <li nav-id="modifier-manage" class="has-sub">
                        <a href="javascript:;">
                            <b class="caret pull-right"></b>
                            <span>Role</span>
                        </a>

                        <ul class="sub-menu">
                            <li nav-id="modifier-manage-modifier"><a href="/backend/role/create">Entry</a></li>
                            <li nav-id="modifier-manage-modifierpanel"><a href="/backend/role">List</a></li>
                        </ul>
                    </li>
                    <li nav-id="modifier-manage" class="has-sub">
                        <a href="javascript:;">
                            <b class="caret pull-right"></b>
                            <span>Permission</span>
                        </a>

                        <ul class="sub-menu">
                            <li nav-id="modifier-manage-modifier"><a href="/backend/permission/create">Entry</a></li>
                            <li nav-id="modifier-manage-modifierpanel"><a href="/backend/permission">List</a></li>

                        </ul>
                    </li>
                    <li nav-id="modifier-create" class="has-sub">
                        <a href="javascript:;">
                            <b class="caret pull-right"></b>
                            <span>Staff</span>
                        </a>

                        <ul class="sub-menu">
                            <li nav-id="modifier-create-modifier"><a href="/backend/user/create">Entry</a></li>
                            <li nav-id="modifier-create-modifierpanel"><a href="/backend/user">List</a></li>
                        </ul>
                    </li>
                    <li nav-id="">
                        <a href="/backend/config">
                            <b class="caret pull-right"></b>
                            <span>Site Config</span>
                        </a>
                    </li>
                    <li nav-id="modifier-create" class="has-sub">
                        <a href="javascript:;">
                            <b class="caret pull-right"></b>

                            <span>Event</span>
                        </a>

                        <ul class="sub-menu">
                            <li nav-id="modifier-create-modifier"><a href="/backend/event/create">Entry</a></li>
                            <li nav-id="modifier-create-modifierpanel"><a href="/backend/event">List</a></li>
                        </ul>
                    </li>
                    <li nav-id="modifier-create" class="has-sub">
                        <a href="javascript:;">
                            <b class="caret pull-right"></b>

                            <span>Page</span>
                        </a>

                        <ul class="sub-menu">
                            <li nav-id="modifier-create-modifier"><a href="/backend/page/create">Entry</a></li>
                            <li nav-id="modifier-create-modifierpanel"><a href="/backend/page">List</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- end sidebar nav -->
    </div>
    <!-- end sidebar scrollbar -->
</div>
<div class="sidebar-bg"></div>    <!-- end #sidebar -->

<script type="text/javascript">
    $(document).ready(function() {
        //make sidebar active current tab when a page is selected
        var path = window.location.pathname;
//        path = path.replace(/\/$/, "");
//        path = decodeURIComponent(path);
        var submenu = '.sub-menu li';
        var hassub = '.has-sub';

        $(hassub).removeClass('active');
        $(submenu).removeClass('active');

        $(".sub-menu li a").each(function () {
            var href = $(this).attr('href');

            if (path === href) {
                $(this).closest('li').addClass('active');
                $(this).closest('.has-sub').addClass('active');
                $(this).parents(".has-sub:eq(1)").toggleClass("active");
            }
        });
    });
</script>
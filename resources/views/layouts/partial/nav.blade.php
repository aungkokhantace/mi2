<!-- begin #sidebar -->
<div id="sidebar" class="sidebar">
    <!-- begin sidebar scrollbar -->
    <div data-scrollbar="true" data-height="100%">
        <!-- begin sidebar nav -->
        <ul class="nav">
            <!-- begin sidebar minify button -->
            <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
            <!-- end sidebar minify button -->
            <li class="nav-header">Event</li>

            @if(Auth::guard('User')->user()->role_id == '1' || Auth::guard('User')->user()->role_id == '2')
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
            @endif

            @if(Auth::guard('User')->user()->role_id == '1' || Auth::guard('User')->user()->role_id == '2' || Auth::guard('User')->user()->role_id == '3')
            <li nav-id='event_registration'  class="has-sub" >
                <a href="javascript:;">
                    <b class="caret pull-right"></b>
                    <i class="fa fa-calendar"></i>
                    <span>Event Registration</span>
                </a>

                <ul class="sub-menu">
                    <li nav-id="report-event-abstraact"><a href="/backend/register">List</a></li>
                </ul>
            </li>
            @endif

            @if(Auth::guard('User')->user()->role_id == '1' || Auth::guard('User')->user()->role_id == '2' || Auth::guard('User')->user()->role_id == '4')
            <li nav-id='event_abstract'  class="has-sub" >
                <a href="javascript:;">
                    <b class="caret pull-right"></b>
                    <i class="fa fa-calendar"></i>
                    <span>Event Abstract</span>
                </a>
                <ul class="sub-menu">
                    <li nav-id="report-event-abstraact"><a href="/backend/abstractform">List</a></li>
                </ul>
            </li>
            @endif

            <li class="nav-header">Setup</li>

            @if(Auth::guard('User')->user()->role_id == '1' || Auth::guard('User')->user()->role_id == '2')
            <li  nav-id='modifier'  class="has-sub">
                <a href="javascript:;">
                    <b class="caret pull-right"></b>
                    <i class="fa fa-users"></i>
                    <span>Frontend</span>
                </a>
                <ul class="sub-menu">
                    @if(Auth::guard('User')->user()->role_id == '1')
                    <li nav-id="modifier-manage" class="has-sub">
                        <a href="javascript:;">
                            <b class="caret pull-right"></b>
                            <span>Menu</span>
                        </a>

                        <ul class="sub-menu">
                            <li nav-id="menu-entry"><a href="/backend/menu/create">Entry</a></li>
                            <li nav-id="menu-list"><a href="/backend/menu">List</a></li>
                        </ul>
                    </li>
                    @endif
                    @if(Auth::guard('User')->user()->role_id == '1')
                    <li nav-id="modifier-manage" class="has-sub">
                        <a href="javascript:;">
                            <b class="caret pull-right"></b>
                            <span>Menu Detail</span>
                        </a>

                        <ul class="sub-menu">
                            <li nav-id="menu-entry"><a href="/backend/menudetail/create">Entry</a></li>
                            <li nav-id="menu-list"><a href="/backend/menudetail">List</a></li>

                        </ul>
                    </li>
                    @endif
                    @if(Auth::guard('User')->user()->role_id == '1')
                    <li nav-id="modifier-create" class="has-sub">
                        <a href="javascript:;">
                            <b class="caret pull-right"></b>
                            <span>Template</span>
                        </a>

                        <ul class="sub-menu">
                            <li nav-id="menu-entry"><a href="/backend/template/create">Entry</a></li>
                            <li nav-id="menu-list"><a href="/backend/template">List</a></li>
                        </ul>
                    </li>
                    @endif
                    @if(Auth::guard('User')->user()->role_id == '1')
                    <li nav-id="modifier-create" class="has-sub">
                        <a href="javascript:;">
                            <b class="caret pull-right"></b>
                            <span>Slider</span>
                        </a>

                        <ul class="sub-menu">
                            <li nav-id="modifier-manage-modifierpanel"><a href="/backend/templateslider/create">Entry</a></li>
                            <li nav-id="modifier-manage-modifierpanel"><a href="/backend/templateslider">List</a></li>
                        </ul>
                    </li>
                    @endif
                    <li nav-id="modifier-create" class="has-sub">
                        <a href="javascript:;">
                            <b class="caret pull-right"></b>
                            <span>Medical Speciality</span>
                        </a>

                        <ul class="sub-menu">
                            <li nav-id="modifier-manage-modifierpanel"><a href="/backend/medicalspeciality/create">Entry</a></li>
                            <li nav-id="modifier-manage-modifierpanel"><a href="/backend/medicalspeciality">List</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            @endif

            <li  nav-id='modifier'  class="has-sub">
                <a href="javascript:;">
                    <b class="caret pull-right"></b>
                    <i class="fa fa-users"></i>
                    <span>Backend</span>
                </a>
                <ul class="sub-menu">
                    @if(Auth::guard('User')->user()->role_id == '1')
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
                    @endif

                    @if(Auth::guard('User')->user()->role_id == '1')
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
                    @endif

                    @if(Auth::guard('User')->user()->role_id == '1' || Auth::guard('User')->user()->role_id == '2')
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
                    @endif

                    @if(Auth::guard('User')->user()->role_id == '1' || Auth::guard('User')->user()->role_id == '2')
                    <li nav-id="">
                        <a href="/backend/config">
                            <b class="caret pull-right"></b>
                            <span>Site Config</span>
                        </a>
                    </li>
                    @endif

                    @if(Auth::guard('User')->user()->role_id == '1')
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
                    @endif

                    @if(Auth::guard('User')->user()->role_id == '1' || Auth::guard('User')->user()->role_id == '2')
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
                    @endif

                    @if(Auth::guard('User')->user()->role_id == '1')
                    <li nav-id="modifier-create" class="has-sub">
                        <a href="javascript:;">
                            <b class="caret pull-right"></b>
                            <span>Post</span>
                        </a>
                        <ul class="sub-menu">
                            <li nav-id="modifier-create-modifier"><a href="/backend/post/create">Entry</a></li>
                            <li nav-id="modifier-create-modifierpanel"><a href="/backend/post">List</a></li>
                        </ul>
                    </li>
                    @endif

                    @if(Auth::guard('User')->user()->role_id == '1' || Auth::guard('User')->user()->role_id == '2')
                    <li nav-id="modifier-create" class="has-sub">
                        <a href="javascript:;">
                            <b class="caret pull-right"></b>
                            <span>Registration Categories</span>
                        </a>
                        <ul class="sub-menu">
                            <li nav-id="modifier-create-modifier"><a href="/backend/registrationcategory/create">Entry</a></li>
                            <li nav-id="modifier-create-modifierpanel"><a href="/backend/registrationcategory">List</a></li>
                        </ul>
                    </li>
                    @endif

                    @if(Auth::guard('User')->user()->role_id == '1' || Auth::guard('User')->user()->role_id == '2')
                    <li nav-id="modifier-create" class="has-sub">
                        <a href="javascript:;">
                            <b class="caret pull-right"></b>
                            <span>Event Email</span>
                        </a>
                        <ul class="sub-menu">
                            <li nav-id="modifier-create-modifier"><a href="/backend/eventemail/create">Entry</a></li>
                            <li nav-id="modifier-create-modifierpanel"><a href="/backend/eventemail">List</a></li>
                        </ul>
                    </li>
                    @endif

                    <li nav-id="modifier-create" class="has-sub">
                        <a href="javascript:;">
                            <b class="caret pull-right"></b>
                            <span>Email Text</span>
                        </a>
                        <ul class="sub-menu">
                            {{--<li nav-id="modifier-create-modifier"><a href="/backend/registrationemail">Registration Email</a></li>--}}
                            {{--<li nav-id="modifier-create-modifierpanel"><a href="/backend/abstractemail">Abstract Email</a></li>--}}
                            @if(Auth::guard('User')->user()->role_id == '1' || Auth::guard('User')->user()->role_id == '2' || Auth::guard('User')->user()->role_id == '3')
                            <li nav-id="modifier-create-modifierpanel"><a href="/backend/registration_submit_user_email">Registration Submit User Email</a></li>
                            <li nav-id="modifier-create-modifierpanel"><a href="/backend/registration_submit_admin_email">Registration Submit Admin Email</a></li>
                            @endif

                            @if(Auth::guard('User')->user()->role_id == '1' || Auth::guard('User')->user()->role_id == '2' || Auth::guard('User')->user()->role_id == '3')
                            <li nav-id="modifier-create-modifierpanel"><a href="/backend/registration_confirm_user_email">Registration Confirm User Email</a></li>
                            <li nav-id="modifier-create-modifierpanel"><a href="/backend/registration_confirm_admin_email">Registration Confirm Admin Email</a></li>
                            @endif

                            @if(Auth::guard('User')->user()->role_id == '1' || Auth::guard('User')->user()->role_id == '2' || Auth::guard('User')->user()->role_id == '4')
                            <li nav-id="modifier-create-modifierpanel"><a href="/backend/abstract_submit_user_email">Abstract Submit User Email</a></li>
                            <li nav-id="modifier-create-modifierpanel"><a href="/backend/abstract_submit_admin_email">Abstract Submit Admin Email</a></li>
                            @endif

                            @if(Auth::guard('User')->user()->role_id == '1' || Auth::guard('User')->user()->role_id == '2' || Auth::guard('User')->user()->role_id == '4')
                            <li nav-id="modifier-create-modifierpanel"><a href="/backend/abstract_confirm_user_email_1">Abstract Confirm User Email (Oral Presentation)</a></li>
                            <li nav-id="modifier-create-modifierpanel"><a href="/backend/abstract_confirm_admin_email_1">Abstract Confirm Admin Email (Oral Presentation)</a></li>
                            @endif

                            @if(Auth::guard('User')->user()->role_id == '1' || Auth::guard('User')->user()->role_id == '2' || Auth::guard('User')->user()->role_id == '4')
                            <li nav-id="modifier-create-modifierpanel"><a href="/backend/abstract_confirm_user_email_2">Abstract Confirm User Email (Poster Presentation)</a></li>
                            <li nav-id="modifier-create-modifierpanel"><a href="/backend/abstract_confirm_admin_email_2">Abstract Confirm Admin Email (Poster Presentation)</a></li>
                            @endif

                            @if(Auth::guard('User')->user()->role_id == '1' || Auth::guard('User')->user()->role_id == '2' || Auth::guard('User')->user()->role_id == '4')
                            <li nav-id="modifier-create-modifierpanel"><a href="/backend/abstract_reject_user_email">Abstract Reject User Email</a></li>
                            <li nav-id="modifier-create-modifierpanel"><a href="/backend/abstract_reject_admin_email">Abstract Reject Admin Email</a></li>
                            @endif
                        </ul>
                    </li>
                </ul>
            </li>

            @if(Auth::guard('User')->user()->role_id == '1')
                <li nav-id="modifier-manage-modifierpanel"><a href="/backend/systemreference">System Reference</a></li>
            @endif
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
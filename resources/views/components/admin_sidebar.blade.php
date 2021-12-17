<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span><i class="fe fe-home"></i> Main</span>
                </li>
                <li class="active">
                    <a href="{{route('admin.home')}}"><span>Dashboard</span></a>
                </li>
                @if(Auth::user()->hasRole('administrator') ||
                    Auth::user()->hasRole('superadministrator') ||
                    Auth::user()->hasRole('developer'))
                <li class="submenu">
                    <a href="#"><span>Members</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
{{--                        <li><a class="" href="#"> Mentor </a></li>--}}
{{--                        <li><a class="" href="#"> Apprentices </a></li>--}}
{{--                        <li><a class="" href="#"> Admins </a></li>--}}
                        <li><a class="" href="{{route('admin.register')}}">New </a></li>
                        <li><a class="" href="{{route('apprentices')}}">Apprentices </a></li>
                        <li><a class="" href="{{route('mentors')}}">Mentors </a></li>
                        <li><a class="" href="{{route('admins')}}">Admins </a></li>
                    </ul>
                </li>

                <hr>
                <li class="">
                    <a href="{{route('admin.settings')}}"><span>Settings</span></a>
                </li>
                @endif
                <hr>
                <li class="menu-title">
                    <span><i class="fe fe-document"></i> Menus</span>
                </li>
                <li class="submenu">
                    <a href="#"><span>Blog</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a class="" href="{{route('blog.new')}}"> New </a></li>
                        <li><a class="" href="{{route('blog.list')}}"> Blogs </a></li>
                    </ul>
                </li>
                @if(Auth::user()->hasRole('administrator') ||
               Auth::user()->hasRole('superadministrator') ||
               Auth::user()->hasRole('developer'))
                <li class="submenu">
                    <a href="#"><span>Team</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a class="" href="{{route('team.add')}}"> New </a></li>
                        <li><a class="" href="{{route('team.list')}}"> List </a></li>
                    </ul>
                </li>
                    <li class="submenu">
                        <a href="#"><span>Testimonial</span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a class="" href="{{route('testimonial.add')}}"> New </a></li>
                            <li><a class="" href="{{route('testimonial.list')}}"> List </a></li>
                        </ul>
                    </li>
                @endif
                <hr>
                @if(Auth::user()->hasRole('administrator') ||
               Auth::user()->hasRole('superadministrator') ||
               Auth::user()->hasRole('developer'))
                <li class="menu-title">
                    <span><i class="fe fe-document"></i> Components</span>
                </li>
                <li class="submenu">
                    <a href="#"><span>Events</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a class="" href="{{route('events.add')}}"> New</a></li>
                        <li><a class="" href="{{route('events.upcoming')}}"> Upcoming</a></li>
                        <li><a class="" href="{{route('events.past')}}"> Past</a></li>
                        <li><a class="" href="{{route('admin.events.patrons')}}"> Patrons</a></li>
                    </ul>
                </li>
                <li class="menu-title">
                    <span><i class="fe fe-document"></i> Community</span>
                </li>
                <li class="submenu">
                    <a href="#"><span>Supports</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a class="" href="{{route('admin.events.patrons')}}"> Patrons</a></li>
                        <li><a class="" href="{{route('subscribers')}}"> Subscribers</a></li>
                        <li><a class="" href="{{route('broadcast.new')}}"> Broadcast</a></li>
                    </ul>
                </li>

                @endif
            </ul>
        </div>
    </div>
</div>

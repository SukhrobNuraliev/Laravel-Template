{{--
 * Author: Archie, Disono (webmonsph@gmail.com)
 * Website: https://github.com/disono/Laravel-Template & http://www.webmons.com
 * License: Apache 2.0
--}}
<div id="sidebar-wrapper" class="nav-side-menu">
    <ul class="sidebar-nav">
        {{-- user --}}
        <li data-toggle="collapse" data-target="#sidebar-users" class="collapsed">
            <a href="#"><i class="fa fa-user" aria-hidden="true"></i> Users</a>
        </li>
        <ul class="sub-menu collapse" id="sidebar-users">
            <li><a href="{{url('admin/user/create')}}">Create User</a></li>
            <li><a href="{{url('admin/user/map')}}">Locator</a></li>

            @foreach(\App\Models\Role::getAll(['exclude' => ['slug' => ['admin']]]) as $row)
                <li><a href="{{url('admin/users?role=' . $row->slug)}}">{{$row->name}}</a></li>
            @endforeach

            <li><a href="{{url('admin/users')}}">View all</a></li>
        </ul>

        {{-- page --}}
        <li data-toggle="collapse" data-target="#sidebar-pages" class="collapsed">
            <a href="#"><i class="fa fa-file-text-o" aria-hidden="true"></i> Pages</a>
        </li>
        <ul class="sub-menu collapse" id="sidebar-pages">
            <li><a href="{{url('admin/page-categories')}}">Page Categories</a></li>
            <li><a href="{{url('admin/pages')}}">Pages</a></li>
            <li><a href="{{url('admin/subscriber')}}">Subscriber</a></li>
            <li><a href="{{url('admin/page/view')}}">Page Activity & Views</a>
            </li>
        </ul>

        {{-- event --}}
        <li data-toggle="collapse" data-target="#sidebar-events" class="collapsed">
            <a href="#"><i class="fa fa-calendar-o" aria-hidden="true"></i> Events</a>
        </li>
        <ul class="sub-menu collapse" id="sidebar-events">
            <li><a href="{{url('admin/event/create')}}">Create Event</a></li>
            <li><a href="{{url('admin/events')}}">View all</a></li>
        </ul>

        {{-- images --}}
        <li data-toggle="collapse" data-target="#sidebar-images" class="collapsed">
            <a href="#"><i class="fa fa-image" aria-hidden="true"></i> Images</a>
        </li>
        <ul class="sub-menu collapse" id="sidebar-images">
            <li><a href="{{url('admin/albums')}}">Albums</a></li>
            <li><a href="{{url('admin/images')}}">Images</a></li>
        </ul>

        {{-- messages --}}
        <li><a href="{{url('admin/message')}}"><i class="fa fa-envelope-o" aria-hidden="true"></i> Messages</a></li>

        {{-- settings --}}
        <li data-toggle="collapse" data-target="#settings" class="collapsed">
            <a href="#"><i class="fa fa-cog" aria-hidden="true"></i> Settings <span class="arrow"></span></a>
        </li>
        <ul class="sub-menu collapse" id="settings">
            <li><a href="{{url('admin/settings')}}"><i class="fa fa-user" aria-hidden="true"></i> Application
                    Settings</a></li>

            <li><a href="{{url('admin/activity')}}"><i class="fa fa-sticky-note-o" aria-hidden="true"></i> Activity Logs</a>
            </li>

            <li data-toggle="collapse" data-target="#authorization" class="collapsed">
                <a href="#"><i class="fa fa-lock" aria-hidden="true"></i> Authorization <span class="arrow"></span></a>
            </li>
            <ul class="sub-menu collapse s-sub-menu" id="authorization">
                <li><a href="{{url('admin/authorization/create')}}">Create Authorization</a></li>
                <li><a href="{{url('admin/authorization/histories')}}">Authorization History</a></li>
                <li><a href="{{url('admin/authorizations')}}">View all</a></li>
            </ul>

            <li data-toggle="collapse" data-target="#roles" class="collapsed">
                <a href="#"><i class="fa fa-users" aria-hidden="true"></i> Roles <span class="arrow"></span></a>
            </li>
            <ul class="sub-menu collapse s-sub-menu" id="roles">
                <li><a href="{{url('admin/role/create')}}">Create Role</a></li>
                <li><a href="{{url('admin/roles')}}">View all</a></li>
            </ul>
        </ul>
    </ul>
</div>
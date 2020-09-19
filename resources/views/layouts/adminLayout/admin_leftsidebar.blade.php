<?php $url = url()->current();?>
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="{{ request()->is('admin/home') ? 'active' : '' }}" href="{{ url('/admin/home') }}">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sub-menu">

                    <a href="{{url('admin/ads')}}" class="{{ request()->is('admin/ads') ? 'active' : '' || request()->is('admin/ads/create') ? 'active' : ''}}">
                        <i class=" fa fa-list-alt"></i>
                        <span>Ads</span>
                    </a>
                   {{-- <ul class="sub">
                        <li>
                            <a class="{{ request()->is('admin/categories') ? 'selected' : '' }}" href="{{url('admin/categories')}}">View Categories</a>
                        </li>
                        <li>
                        <a class="{{ request()->is('admin/categories/create') ? 'selected' : '' }}" href="{{url('/admin/categories/create')}}">Add Categories</a></li>
                    </ul>--}}
                </li>



                <li class="sub-menu">

                        <a href="{{url('/admin/users')}}" class="{{ request()->is('admin/users') ? 'active' : '' || request()->is('admin/users/create') ? 'active' : ''}}">
                            <i class=" fa fa-list-alt"></i>
                            <span>Users</span>
                        </a>

                </li>

                @can('role_list')
                <li class="sub-menu">
                    <a href="javascript:;" class="{{ request()->is('admin/roles') ? 'active' : '' || request()->is('admin/roles/create') ? 'active' : ''}}">
                        <i class=" fa fa-list-alt"></i>
                        <span>Roles</span>
                    </a>
                    <ul class="sub">
                        <li><a class="{{ request()->is('admin/roles') ? 'selected' : '' }}" href="{{url('/admin/roles')}}">View Roles</a></li>
                        @can('role_create')
                        <li><a class="{{ request()->is('admin/roles/create') ? 'selected' : '' }}" href="{{url('/admin/roles/create')}}">Add Roles</a></li>
                        @endcan
                    </ul>
                </li>                
                @endcan

            </ul>            </div>
        <!-- sidebar menu end-->
    </div>
</aside>
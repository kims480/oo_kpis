@php
$urlAdmin=config('fast.admin_prefix');
@endphp

@can('dashboard')
@php
$isDashboardActive = Request::is($urlAdmin);
@endphp
<li class="nav-item">
    <a href="{{ route('dashboard') }}" class="nav-link {{ $isDashboardActive ? 'active' : '' }}">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>@lang('menu.dashboard')</p>
    </a>
</li>
@endcan

@can('generator_builder.index')
@php
$isUserActive = Request::is($urlAdmin.'*generator_builder*');
@endphp
<div @click="$store.sidebar.active = 'home' " x-data="tooltip" x-on:mouseover="show = true"
                    x-on:mouseleave="show = false"
                    class=" relative flex justify-between items-center text-gray-400 hover:text-gray-200 hover:bg-gray-800 space-x-2 rounded-md p-2 cursor-pointer"
                    x-bind:class="{'justify-start': $store.sidebar.full, 'sm:justify-center':!$store.sidebar.full,'text-gray-200 bg-gray-800':$store.sidebar.active == 'schedules','text-gray-400 ':$store.sidebar.active != 'schedules'}">
                    <div class="flex  items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <a href="{{ route('generator_builder.index') }}" class="nav-link {{ $isUserActive ? 'active' : '' }}">

                            <h1 x-cloak
                            x-bind:class="!$store.sidebar.full && show ? visibleClass :'' || !$store.sidebar.full && !show ? 'sm:hidden':''">
                            @lang('menu.generator_builder.title')</h1>

                        </a>

                    </div>
                    <div x-cloak x-bind:class="$store.sidebar.full ? '':'sm:hidden'"
                        class="flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <h1 class="w-5 h-5 p-1 bg-pink-400 rounded-sm text-sm leading-3 text-center text-gray-900">3
                        </h1>

                    </div>
                </div>

@endcan

@can('attendances.index')
@php
$isUserActive = Request::is($urlAdmin.'*attendances*');
@endphp

<div @click="$store.sidebar.active = 'home' " x-data="tooltip" x-on:mouseover="show = true"
x-on:mouseleave="show = false"
class=" relative flex justify-between items-center text-gray-400 hover:text-gray-200 hover:bg-gray-800 space-x-2 rounded-md p-2 cursor-pointer"
x-bind:class="{'justify-start': $store.sidebar.full, 'sm:justify-center':!$store.sidebar.full,'text-gray-200 bg-gray-800':$store.sidebar.active == 'schedules',
'text-gray-400 ':$store.sidebar.active != 'schedules'}">
    <a href="{{ route('attendances.index') }}" class="nav-link {{ $isUserActive ? 'active' : '' }}">
        <i class="nav-icon fas fa-calendar-alt"></i>

        <h1 x-cloak
        x-bind:class="!$store.sidebar.full && show ? visibleClass :'' || !$store.sidebar.full && !show ? 'sm:hidden':''">@lang('menu.attendances.title')</h1>
    </a>
</div>
@endcan

@canany(['users.index','roles.index','permissions.index'])
@php
$isUserActive = Request::is($urlAdmin.'*users*');
$isRoleActive = Request::is($urlAdmin.'*roles*');
$isPermissionActive = Request::is($urlAdmin.'*permissions*');
@endphp
<div @click="$store.sidebar.active = 'home' " x-data="tooltip" x-on:mouseover="show = true"
x-on:mouseleave="show = false"
class=" relative flex justify-between items-center text-gray-400 hover:text-gray-200 hover:bg-gray-800 space-x-2 rounded-md p-2 cursor-pointer"
x-bind:class="{'justify-start': $store.sidebar.full, 'sm:justify-center':!$store.sidebar.full,'text-gray-200 bg-gray-800':$store.sidebar.active == 'schedules',
'text-gray-400 ':$store.sidebar.active != 'schedules'}"{{--  class="nav-item {{($isUserActive||$isRoleActive||$isPermissionActive)?'menu-open':''}} " --}}>
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-shield-virus"></i>
        <p>
            @lang('menu.user.title')
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        @can('users.index')
        <li class="nav-item">
            <a href="{{ route('users.index') }}" class="nav-link {{ $isUserActive ? 'active' : '' }}">
                <i class="nav-icon fas fa-users"></i>
                <p>
                    @lang('menu.user.users')
                </p>
            </a>
        </li>
        @endcan
        @can('roles.index')
        <li class="nav-item">
            <a href="{{ route('roles.index') }}" class="nav-link {{ $isRoleActive ? 'active' : '' }}">
                <i class="nav-icon fas fa-user-shield"></i>
                <p>
                    @lang('menu.user.roles')
                </p>
            </a>
        </li>
        @endcan
        @can('permissions.index')
        <li class="nav-item ">
            <a href="{{ route('permissions.index') }}" class="nav-link {{ $isPermissionActive ? 'active' : '' }}">
                <i class="nav-icon fas fa-shield-alt"></i>
                <p>
                    @lang('menu.user.permissions')
                </p>
            </a>
        </li>
        @endcan
    </ul>
</div>
@endcan
@can('fileUploads.index')
<li class="nav-item">
    <a href="{{ route('fileUploads.index') }}" class="nav-link {{ Request::is('fileUploads*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-file-alt"></i>
        <p>@lang('models/fileUploads.plural')</p>
    </a>
</li>
@endcan

@can('sites.index')
<li class="nav-item">
    <a href="{{ route('sites.index') }}"
       class="nav-link {{ Request::is('admin/sites*') ? 'active' : '' }}">
        <p>@lang('models/sites.plural')</p>
    </a>
</li>
@endcan

@can('imports.index')
<li class="nav-item">
    <a href="{{ route('imports.index') }}"
       class="nav-link {{ Request::is('admin/imports*') ? 'active' : '' }}">
        <p>@lang('models/snags.plural')</p>
    </a>
</li>
@endcan

@can('regions.index')
<li class="nav-item">
    <a href="{{ route('regions.index') }}"
       class="nav-link {{ Request::is('admin/regions*') ? 'active' : '' }}">
        <p>@lang('models/regions.plural')</p>
    </a>
</li>
@endcan

@can('offices.index')
<li class="nav-item">
    <a href="{{ route('offices.index') }}"
       class="nav-link {{ Request::is('admin/offices*') ? 'active' : '' }}">
        <p>@lang('models/offices.plural')</p>
    </a>
</li>
@endcan
@can('governs.index')

<li class="nav-item">
    <a href="{{ route('governs.index') }}"
       class="nav-link {{ Request::is('admin/governs*') ? 'active' : '' }}">
        <p>@lang('models/governs.plural')</p>
    </a>
</li>
@endcan
@can('wilayats.index')
<li class="nav-item">
    <a href="{{ route('wilayats.index') }}"
       class="nav-link {{ Request::is('admin/wilayats*') ? 'active' : '' }}">
        <p>@lang('models/wilayats.plural')</p>
    </a>
</li>
@endcan
@can('snag-domains.index')

<li class="nav-item">
    <a href="{{ route('snag-domains.index') }}"
       class="nav-link {{ Request::is('snagdomains*') ? 'active' : '' }}">
        <p>@lang('models/snagdomains.plural')</p>
    </a>
</li>
@endcan
@can('snagstatuses.index')
<li class="nav-item">
    <a href="{{ route('snag-statuses.index') }}"
       class="nav-link {{ Request::is('admin/snagstatuses*') ? 'active' : '' }}">
        <p>@lang('models/snagstatuses.plural')</p>
    </a>
</li>
@endcan

@can('sitesnags.index')
<li class="nav-item">
    <a href="{{ route('site-snags.index') }}"
       class="nav-link {{ Request::is('admin/siteSnags*') ? 'active' : '' }}">
        <p>@lang('models/siteSnags.plural')</p>
    </a>
</li>
@endcan
@can('snagremarks.index')
<li class="nav-item">
    <a href="{{ route('snag-remarks.index') }}"
       class="nav-link {{ Request::is('admin/snagremarks*') ? 'active' : '' }}">
        <p>@lang('models/snagremarks.plural')</p>
    </a>
</li>
@endcan
@can('snagreporters.index')
<li class="nav-item">
    <a href="{{ route('snag-reporters.index') }}"
       class="nav-link {{ Request::is('admin/snagreporters*') ? 'active' : '' }}">
        <p>@lang('models/snagreporters.plural')</p>
    </a>
</li>
@endcan
@can('siteCategs.index')
<li class="nav-item">
    <a href="{{ route('site-categs.index') }}"
       class="nav-link {{ Request::is('admin/siteCategs*') ? 'active' : '' }}">
        <p>@lang('models/siteCategs.plural')</p>
    </a>
</li>
@endcan
@can('sitePrios.index')
<li class="nav-item">
    <a href="{{ route('site-prios.index') }}"
       class="nav-link {{ Request::is('admin/sitePrios*') ? 'active' : '' }}">
        <p>@lang('models/sitePrios.plural')</p>
    </a>
</li>
@endcan
@can('siteTypes.index')
<li class="nav-item">
    <a href="{{ route('site-types.index') }}"
       class="nav-link {{ Request::is('admin/siteTypes*') ? 'active' : '' }}">
        <p>@lang('models/siteTypes.plural')</p>
    </a>
</li>

@endcan

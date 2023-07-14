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
<li class="nav-item">
    <a href="{{ route('generator_builder.index') }}" class="nav-link {{ $isUserActive ? 'active' : '' }}">
        <i class="nav-icon fas fa-coins"></i>
        <p>@lang('menu.generator_builder.title')</p>
    </a>
</li>
@endcan

@can('attendances.index')
@php
$isUserActive = Request::is($urlAdmin.'*attendances*');
@endphp

<li class="nav-item">
    <a href="{{ route('attendances.index') }}" class="nav-link {{ $isUserActive ? 'active' : '' }}">
        <i class="nav-icon fas fa-calendar-alt"></i>

        <p>@lang('menu.attendances.title')</p>
    </a>
</li>
@endcan

@canany(['users.index','roles.index','permissions.index'])
@php
$isUserActive = Request::is($urlAdmin.'*users*');
$isRoleActive = Request::is($urlAdmin.'*roles*');
$isPermissionActive = Request::is($urlAdmin.'*permissions*');
@endphp
<li class="nav-item {{($isUserActive||$isRoleActive||$isPermissionActive)?'menu-open':''}} ">
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
</li>
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
@can('snagdomains.index')

<li class="nav-item">
    <a href="{{ route('snagdomains.index') }}"
       class="nav-link {{ Request::is('snagdomains*') ? 'active' : '' }}">
        <p>@lang('models/snagdomains.plural')</p>
    </a>
</li>
@endcan
@can('snagstatuses.index')
<li class="nav-item">
    <a href="{{ route('snagstatuses.index') }}"
       class="nav-link {{ Request::is('admin/snagstatuses*') ? 'active' : '' }}">
        <p>@lang('models/snagstatuses.plural')</p>
    </a>
</li>
@endcan

@can('siteSnags.index')
<li class="nav-item">
    <a href="{{ route('siteSnags.index') }}"
       class="nav-link {{ Request::is('admin/siteSnags*') ? 'active' : '' }}">
        <p>@lang('models/siteSnags.plural')</p>
    </a>
</li>
@endcan
@can('snagremarks.index')
<li class="nav-item">
    <a href="{{ route('snagremarks.index') }}"
       class="nav-link {{ Request::is('admin/snagremarks*') ? 'active' : '' }}">
        <p>@lang('models/snagremarks.plural')</p>
    </a>
</li>
@endcan
@can('snagreporters.index')
<li class="nav-item">
    <a href="{{ route('snagreporters.index') }}"
       class="nav-link {{ Request::is('admin/snagreporters*') ? 'active' : '' }}">
        <p>@lang('models/snagreporters.plural')</p>
    </a>
</li>
@endcan
@can('siteCategs.index')
<li class="nav-item">
    <a href="{{ route('siteCategs.index') }}"
       class="nav-link {{ Request::is('admin/siteCategs*') ? 'active' : '' }}">
        <p>@lang('models/siteCategs.plural')</p>
    </a>
</li>
@endcan
@can('sitePrios.index')
<li class="nav-item">
    <a href="{{ route('sitePrios.index') }}"
       class="nav-link {{ Request::is('admin/sitePrios*') ? 'active' : '' }}">
        <p>@lang('models/sitePrios.plural')</p>
    </a>
</li>
@endcan
@can('siteTypes.index')
<li class="nav-item">
    <a href="{{ route('siteTypes.index') }}"
       class="nav-link {{ Request::is('admin/siteTypes*') ? 'active' : '' }}">
        <p>@lang('models/siteTypes.plural')</p>
    </a>
</li>

@endcan

@can('siteTypes.index')
<li class="nav-item">
    <a href="{{ route('batteryAdds.index') }}"
       class="nav-link {{ Request::is('batteryAdds*') ? 'active' : '' }}">
        <p>@lang('models/batteryAdds.plural')</p>
    </a>
</li>
@endcan
@can('consumable-spares.index')
<li class="nav-item">
    <a href="{{ route(__('models/consumableSpares.route').'.index') }}"
       class="nav-link {{ Request::is('batteryAdds*') ? 'active' : '' }}">
        <p>@lang('models/consumableSpares.plural')</p>
    </a>
</li>
@endcan

<li class="nav-item">
    <a href="{{ route('passiveSpares.index') }}"
       class="nav-link {{ Request::is('passiveSpares*') ? 'active' : '' }}">
        <p>@lang('models/passiveSpares.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('siteExtras.index') }}"
       class="nav-link {{ Request::is('siteExtras*') ? 'active' : '' }}">
        <p>@lang('models/siteExtras.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('tickets.index') }}"
       class="nav-link {{ Request::is('tickets*') ? 'active' : '' }}">
        <p>@lang('models/tickets.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('alarmCategs.index') }}"
       class="nav-link {{ Request::is('alarmCategs*') ? 'active' : '' }}">
        <p>@lang('models/alarmCategs.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('contractors.index') }}"
       class="nav-link {{ Request::is('contractors*') ? 'active' : '' }}">
        <p>@lang('models/contractors.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('otcSites.index') }}"
       class="nav-link {{ Request::is('otcSites*') ? 'active' : '' }}">
        <p>@lang('models/otcSites.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('otcScopes.index') }}"
       class="nav-link {{ Request::is('otcScopes*') ? 'active' : '' }}">
        <p>@lang('models/otcScopes.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('otcScopes.index') }}"
       class="nav-link {{ Request::is('otcScopes*') ? 'active' : '' }}">
        <p>@lang('models/otcScopes.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('otcScopes.index') }}"
       class="nav-link {{ Request::is('otcScopes*') ? 'active' : '' }}">
        <p>@lang('models/otcScopes.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('otcScopes.index') }}"
       class="nav-link {{ Request::is('otcScopes*') ? 'active' : '' }}">
        <p>@lang('models/otcScopes.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('otcScopes.index') }}"
       class="nav-link {{ Request::is('otcScopes*') ? 'active' : '' }}">
        <p>@lang('models/otcScopes.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('otcScopes.index') }}"
       class="nav-link {{ Request::is('otcScopes*') ? 'active' : '' }}">
        <p>@lang('models/otcScopes.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('otcScopes.index') }}"
       class="nav-link {{ Request::is('otcScopes*') ? 'active' : '' }}">
        <p>@lang('models/otcScopes.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('otcScopes.index') }}"
       class="nav-link {{ Request::is('otcScopes*') ? 'active' : '' }}">
        <p>@lang('models/otcScopes.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('otcCategs.index') }}"
       class="nav-link {{ Request::is('otcCategs*') ? 'active' : '' }}">
        <p>@lang('models/otcCategs.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('otcAlarms.index') }}"
       class="nav-link {{ Request::is('otcAlarms*') ? 'active' : '' }}">
        <p>@lang('models/otcAlarms.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('tTStatuses.index') }}"
       class="nav-link {{ Request::is('tTStatuses*') ? 'active' : '' }}">
        <p>@lang('models/tTStatuses.plural')</p>
    </a>
</li>


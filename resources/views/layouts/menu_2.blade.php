<!-- Home -->
@php
$urlAdmin = config('fast.admin_prefix');
echo Request::is('admin*');

@endphp
<!-- Dashboard -->
@can('dashboard')
    @php
    $isDashboardActive = Request::is($urlAdmin);
    @endphp
    <a href="{{ route('home') }}" x-data="tooltip" x-on:mouseover="show = true" x-on:mouseleave="show = false"
        @click="$store.sidebar.active = 'admin' "
        class=" relative flex items-center hover:text-gray-200 hover:bg-gray-800 space-x-2 rounded-md p-2 cursor-pointer {{ Request::is('admin') ? 'text-gray-200 bg-gray-800' : 'text-gray-400' }}"
        x-bind:class="{
            'justify-start': $store.sidebar.full,
            'sm:justify-center': !$store.sidebar
                .full,
            'text-gray-200 bg-gray-800': $store.sidebar.active == 'admin',
            'text-gray-400 ': $store.sidebar
                .active != 'admin'
        }">
        {{-- <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
        </svg> --}}

        {{-- class="flex justify-between p-0 w-full   items-center " > --}}
        <div class="flex items-center  p-0 w-full space-x-2" {{-- x-bind:class="!$store.sidebar.full && !show ? 'sm:hidden absolute -top-2 -right-3':''" --}}>
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <h3 x-cloak x-cloak
                x-bind:class="!$store.sidebar.full && show ? visibleClass : '' || !$store.sidebar.full && !show ? 'sm:hidden' : ''">
                <span class="">@lang('menu.dashboard')</span>
            </h3>
        </div>

    </a>
@endcan

<!-- Attendances -->
@can('attendances.index')
    @php
    $isUserActive = Request::is($urlAdmin . '*attendances*');
    @endphp

    <a href="{{ route('attendances.index') }}" @click="$store.sidebar.active = 'home' " x-data="tooltip"
        x-on:mouseover="show = true" x-on:mouseleave="show = false"
        class=" relative flex justify-between items-center  {{ $isUserActive ? 'text-gray-200 bg-gray-800' : '' }} text-gray-400 hover:text-gray-200 hover:bg-gray-800 space-x-2 rounded-md p-2 cursor-pointer"
        x-bind:class="{
            'justify-start': $store.sidebar.full,
            'sm:justify-center': !$store.sidebar.full,
            'text-gray-200 bg-gray-800': $store.sidebar.active == 'schedules',
            'text-gray-400 ': $store.sidebar.active != 'schedules'
        }">
        {{-- <a
            class="flex justify-between p-0 w-full   items-center"> --}}
        <div class="flex items-center  p-0 w-full  space-x-2">
            <i class="nav-icon fas fa-calendar-alt"></i>

            <h3 x-cloak
                x-bind:class="!$store.sidebar.full && show ? visibleClass : '' || !$store.sidebar.full && !show ? 'sm:hidden' : ''">
                @lang('menu.attendances.title')</h3>
        </div>
        {{-- </a> --}}
    </a>
@endcan

<!-- Users/Roles/Permissions -->
@canany(['users.index', 'roles.index', 'permissions.index'])
    @php
    $isUserActive = Request::is($urlAdmin . '*users*');
    $isRoleActive = Request::is($urlAdmin . '*roles*');
    $isPermissionActive = Request::is($urlAdmin . '*permissions*');
    @endphp

    <div x-data="dropdown" class="relative">
        <!-- Dropdown head -->
        <div @click="toggle('security')" x-data="tooltip" x-on:mouseover="show = true" x-on:mouseleave="show = false"
            class="flex flex-col justify-between text-gray-400 hover:text-gray-200 hover:bg-gray-800 items-center space-x-2 rounded-md p-2 cursor-pointer"
            x-bind:class="{
                'justify-start': $store.sidebar.full,
                'sm:justify-center': !$store.sidebar
                    .full,
                'text-gray-200 bg-gray-800': $store.sidebar.active == 'security',
                'text-gray-400 ': $store
                    .sidebar.active != 'security'
            }">
            <div
                class="flex justify-between p-0 w-full   items-center{{ Request::is('admin/security*') ? 'active' : '' }}">
                <div class="relative flex space-x-2 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    {{-- <i class="nav-icon fas fa-shield-virus"></i> --}}
                    <h1 x-cloak
                        x-bind:class="!$store.sidebar.full && show ? visibleClass : '' || !$store.sidebar.full && !show ?
                            'sm:hidden' : ''">
                        @lang('menu.user.title')
                        {{-- <i class="fas fa-angle-left right"></i> --}}
                    </h1>
                </div>
                <svg x-cloak x-bind:class="$store.sidebar.full ? '' : 'sm:hidden'" xmlns="http://www.w3.org/2000/svg"
                    class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd" />
                </svg>
            </div>

            <!-- Dropdown content -->
            <div x-cloak x-show="open" @click.outside="open =false"
                x-bind:class="$store.sidebar.full ? expandedClass : shrinkedClass"
                class="text-gray-400 space-y-3 transition-all flex flex-col">
                @can('users.index')
                    <a href="{{ route('users.index') }}"
                        class="hover:text-gray-200 cursor-pointer flex{{ $isUserActive ? 'text-gray-200' : '' }}">
                        <h6 class=" cursor-pointer flex space-x-2">
                            <i class="nav-icon fas fa-users"></i>
                            <span>@lang('menu.user.users')</span>
                        </h6>
                    </a>
                @endcan
                @can('roles.index')
                    <a href="{{ route('roles.index') }}"
                        class="hover:text-gray-200 cursor-pointer flex {{ $isRoleActive ? 'text-gray-200' : '' }}">
                        <h6 class=" cursor-pointer flex space-x-2">
                            <i class="nav-icon fas fa-user-shield"></i>
                            <p>
                                @lang('menu.user.roles')
                            </p>
                        </h6>
                    </a>
                @endcan
                @can('permissions.index')
                    <a href="{{ route('permissions.index') }}"
                        class="hover:text-gray-200 cursor-pointer flex {{ $isPermissionActive ? 'text-gray-200' : '' }}">
                        <h6 class=" cursor-pointer flex space-x-2">
                            <i class="nav-icon fas fa-shield-alt"></i>
                            <p>
                                @lang('menu.user.permissions')
                            </p>
                        </h6>
                    </a>
                @endcan

            </div>
        </div>
    </div>
@endcan

<!-- Snags -->
@canany(['imports.index', __('models/snagdomains.url').'.index', __('models/snagstatuses.url').'.index',__('model/snagremarks.url').'.index',__('models/snagreporters.url').'.index'])
    <div x-data="dropdown" class="relative">
        <!-- Dropdown head -->
        <div @click="toggle('income')" x-data="tooltip" x-on:mouseover="show = true" x-on:mouseleave="show = false"
            class="flex justify-between text-gray-400 hover:text-gray-200 hover:bg-gray-800 items-center space-x-2 rounded-md p-2 cursor-pointer"
            x-bind:class="{
                'justify-start': $store.sidebar.full,
                'sm:justify-center': !$store.sidebar
                    .full,
                'text-gray-200 bg-gray-800': $store.sidebar.active == 'income',
                'text-gray-400 ': $store.sidebar
                    .active != 'income'
            }">
            <div
                class="flex justify-between p-0 w-full   items-center{{ Request::is('admin/security*') ? 'active' : '' }}">

                <div class="relative flex space-x-2 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" />
                    </svg>
                    <h3 x-cloak class="text-base"
                        x-bind:class="!$store.sidebar.full && show ? visibleClass : '' || !$store.sidebar.full && !show ? 'sm:hidden' : ''">
                        Snags</h3>
                </div>
                <svg x-cloak x-bind:class="$store.sidebar.full ? '' : 'sm:hidden'" xmlns="http://www.w3.org/2000/svg"
                    class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd" />
                </svg>
            </div>
        </div>
        <!-- Dropdown content -->
        <div x-cloak x-show="open" @click.outside="open=false" class="pl-0"
            x-bind:class="$store.sidebar.full ? expandedClass : shrinkedClass" class="text-gray-400 space-y-3">

            <a href="{{ route('site-snags.create') }}" class="block text-slate-100 hover:text-gray-200 cursor-pointer">Add Snag</a>
            <a href="{{ route('snags.index') }}" class="block text-gray-400 hover:text-slate-200 cursor-pointer">Snag List</a>

            @can('imports.index')
                <div @click="$store.sidebar.active = 'imports'" x-data="tooltip" x-on:mouseover="show = true"
                    x-on:mouseleave="show = false"
                    class=" relative flex justify-between items-center text-gray-400 hover:text-gray-200 hover:bg-gray-800 space-x-2 rounded-md p-2 cursor-pointer
                    {{ Request::is('admin/imports*') ? 'text-gray-200 bg-gray-800' : 'text-gray-400' }}"
                    x-bind:class="{
                        'justify-start': $store.sidebar.full,
                        'sm:justify-center': !$store.sidebar.full,
                        'text-gray-200 bg-gray-800': $store.sidebar.active == 'imports',
                        'text-gray-400 ': $store.sidebar.active != 'imports'
                    }">
                    <!-- Posts -->
                    <a href="{{ route('imports.index') }}"
                        class="flex justify-between p-0 w-full   items-center space-x-2{{ Request::is('admin/imports*') ? 'active' : '' }}">
                        <div class="flex  items-center space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            <h3 x-cloak class="text-sm"
                                {{-- x-bind:class="!$store.sidebar.full && show ? visibleClass : '' || !$store.sidebar.full && !show ?
                                    'sm:hidden' : ''" --}}
                                    >

                                <span>@lang('models/snags.plural')</span>

                            </h3>

                        </div>
                        <h3 x-cloak x-bind:class="$store.sidebar.full ? '' : 'sm:hidden'"
                            class="w-5 h-5 p-1 bg-green-400 rounded-sm text-sm leading-3 text-center text-gray-900">8</h3>
                    </a>
                </div>
            @endcan

            @can(__('models/snagdomains.url').'.index')
                <div @click="$store.sidebar.active = 'snagdomains'" x-data="tooltip" x-on:mouseover="show = true"
                    x-on:mouseleave="show = false"
                    class=" relative flex justify-between items-center text-gray-400 hover:text-gray-200 hover:bg-gray-800 space-x-2 rounded-md p-2 cursor-pointer
                    {{ Request::is('admin/snagdomains*') ? 'text-gray-200 bg-gray-800' : 'text-gray-400' }}"
                    x-bind:class="{
                        'justify-start': $store.sidebar.full,
                        'sm:justify-center': !$store.sidebar.full,
                        'text-gray-200 bg-gray-800': $store.sidebar.active == 'snagdomains',
                        'text-gray-400 ': $store.sidebar.active != 'snagdomains'
                    }">
                    <!-- snag-domains -->
                    <a href="{{ route(__('models/snagdomains.url').'.index') }}"
                        class="flex justify-between p-0 w-full  items-center space-x-2{{ Request::is('admin/snag-domains*') ? 'active' : '' }}">
                        <div class="flex  items-center space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            <h3 x-cloak class="text-sm"
                                {{-- x-bind:class="!$store.sidebar.full && show ? visibleClass : '' || !$store.sidebar.full && !show ?
                                    'sm:hidden' : ''" --}}
                                    >
                                <p>@lang('models/snagdomains.plural')</p>
                            </h3>

                        </div>
                        <h3 x-cloak x-bind:class="$store.sidebar.full ? '' : 'sm:hidden'"
                            class="w-5 h-5 p-1 bg-green-400 rounded-sm text-sm leading-3 text-center text-gray-900">8</h3>
                    </a>
                </div>
            @endcan

            @can(__('models/snagstatuses.url').'.index')
                <div @click="$store.sidebar.active = 'snag-statuses'" x-data="tooltip" x-on:mouseover="show = true"
                    x-on:mouseleave="show = false"
                    class=" relative flex justify-between items-center text-gray-400 hover:text-gray-200 hover:bg-gray-800 space-x-2 rounded-md p-2 cursor-pointer
                        {{ Request::is('admin/'.__('models/snagstatuses.url').'*') ? 'text-gray-200 bg-gray-800' : 'text-gray-400' }}"
                    x-bind:class="{
                        'justify-start': $store.sidebar.full,
                        'sm:justify-center': !$store.sidebar.full,
                        'text-gray-200 bg-gray-800': $store.sidebar.active == 'snag-statuses',
                        'text-gray-400 ': $store.sidebar.active != 'snag-statuses'
                    }">
                    <!-- Posts -->
                    <a href="{{ route(__('models/snagstatuses.url').'.index') }}"
                        class="flex justify-between p-0 w-full   items-center space-x-2{{ Request::is('admin/snag-statuses*') ? 'active' : '' }}">
                        <div class="flex  items-center space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            <h3 x-cloak class="text-sm"
                                {{-- x-bind:class="!$store.sidebar.full && show ? visibleClass : '' || !$store.sidebar.full && !show ? 'sm:hidden' : ''" --}}
                                    >
                                <p>@lang('models/snagstatuses.plural')</p>
                            </h3>

                        </div>
                        <h3 x-cloak x-bind:class="$store.sidebar.full ? '' : 'sm:hidden'"
                            class="w-5 h-5 p-1 bg-green-400 rounded-sm text-sm leading-3 text-center text-gray-900">8</h3>
                    </a>
                </div>
            @endcan

            @can(__('models/snagremarks.url').'.index')
                <div @click="$store.sidebar.active = 'snag-remarks'" x-data="tooltip" x-on:mouseover="show = true"
                    x-on:mouseleave="show = false"
                    class=" relative flex justify-between items-center text-gray-400 hover:text-gray-200 hover:bg-gray-800 space-x-2 rounded-md p-2 cursor-pointer
                        {{ Request::is('admin/snag-remarks*') ? 'text-gray-200 bg-gray-800' : 'text-gray-400' }}"
                    x-bind:class="{
                        'justify-start': $store.sidebar.full,
                        'sm:justify-center': !$store.sidebar.full,
                        'text-gray-200 bg-gray-800': $store.sidebar.active == 'snag-remarks',
                        'text-gray-400 ': $store.sidebar.active != 'snag-remarks'
                    }">
                    <!-- Posts -->
                    <a href="{{ route(__('models/snagremarks.url').'.index') }}"
                        class="flex justify-between p-0 w-full   items-center space-x-2{{ Request::is('admin/snag-remarks*') ? 'active' : '' }}">
                        <div class="flex  items-center space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            <h3 x-cloak class="text-sm"
                                {{-- x-bind:class="!$store.sidebar.full && show ? visibleClass : '' || !$store.sidebar.full && !show ?  'sm:hidden' : ''" --}}
                                >
                                <p>@lang('models/snagremarks.plural')</p>
                            </h3>

                        </div>
                        <h3 x-cloak x-bind:class="$store.sidebar.full ? '' : 'sm:hidden'"
                            class="w-5 h-5 p-1 bg-green-400 rounded-sm text-sm leading-3 text-center text-gray-900">8</h3>
                    </a>
                </div>
            @endcan

            @can(__('models/snagreporters.url').'.index')
                <div @click="$store.sidebar.active = 'snag-sources'" x-data="tooltip" x-on:mouseover="show = true"
                    x-on:mouseleave="show = false"
                    class=" relative flex justify-between items-center text-gray-400 hover:text-gray-200 hover:bg-gray-800 space-x-2 rounded-md p-2 cursor-pointer
                     {{ Request::is('admin/snag-reporters*') ? 'text-gray-200 bg-gray-800' : 'text-gray-400' }}"
                    x-bind:class="{
                        'justify-start': $store.sidebar.full,
                        'sm:justify-center': !$store.sidebar.full,
                        'text-gray-200 bg-gray-800': $store.sidebar.active == 'snag-reporters',
                        'text-gray-400 ': $store.sidebar.active != 'snag-reporters'
                    }">
                    <!-- Snag Reporters -->
                    <a href="{{ route(__('models/snagreporters.url').'.index') }}"
                        class="flex justify-between p-0 w-full   items-center space-x-2{{ Request::is('admin/snag-sources*') ? 'active' : '' }}">
                        <div class="flex  items-center space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            <h3 x-cloak class="text-sm"
                                {{-- x-bind:class="!$store.sidebar.full && show ? visibleClass : '' || !$store.sidebar.full && !show ?
                                    'sm:hidden' : ''" --}}
                                    >
                                <p>@lang('models/snagreporters.plural')</p>
                            </h3>

                        </div>
                        <h3 x-cloak x-bind:class="$store.sidebar.full ? '' : 'sm:hidden'"
                            class="w-5 h-5 p-1 bg-green-400 rounded-sm text-sm leading-3 text-center text-gray-900">8</h3>
                    </a>
                </div>
            @endcan
            <!-- Sub Dropdown  -->
            {{-- <div x-data="sub_dropdown" class="relative w-full "> --}}
            {{-- <div @click="sub_toggle()" class="flex items-center justify-between cursor-pointer">
                <h1 class="hover:text-gray-200 cursor-pointer">Snag List</h1>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd" />
                </svg>
            </div> --}}
            {{-- <div x-show="sub_open" @click.outside="sub_open = false"
                x-bind:class="$store.sidebar.full ? sub_expandedClass:sub_shrinkedClass">
                <h1 class="hover:text-gray-200 cursor-pointer ">Add Snag</h1>
                <h1 class="hover:text-gray-200 cursor-pointer ">Manage Snag</h1>
                <h1 class="hover:text-gray-200 cursor-pointer ">Snag List</h1>
            </div> --}}
            {{-- </div> --}}
            {{-- <h1 class="hover:text-gray-200 cursor-pointer">Item 4</h1> --}}
        </div>
    </div>
@endcan

<!-- Sites -->
@canany([__('models/sites.url').'.index', __('models/siteCategs.url').'.index', __('models/sitePrios.url').'.index',__('models/siteTypes.url').'.index'])
    <div x-data="dropdown" class="relative">
        <!-- Dropdown head -->
        <div @click="toggle('Sites')" x-data="tooltip" x-on:mouseover="show = true" x-on:mouseleave="show = false"
            class="flex justify-between text-gray-400 hover:text-gray-200 hover:bg-gray-800 items-center space-x-2 rounded-md p-2 cursor-pointer"
            x-bind:class="{
                'justify-start': $store.sidebar.full,
                'sm:justify-center': !$store.sidebar
                    .full,
                'text-gray-200 bg-gray-800': $store.sidebar.active == 'Sites',
                'text-gray-400 ': $store.sidebar
                    .active != 'Sites'
            }">
            <div
                class="flex justify-between p-0 w-full   items-center{{ Request::is('admin/security*') ? 'active' : '' }}">

                <div class="relative flex space-x-2 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" />
                    </svg>
                    <h1 x-cloak
                        x-bind:class="!$store.sidebar.full && show ? visibleClass : '' || !$store.sidebar.full && !show ? 'sm:hidden' : ''">
                        Sites</h1>
                </div>
                <svg x-cloak x-bind:class="$store.sidebar.full ? '' : 'sm:hidden'" xmlns="http://www.w3.org/2000/svg"
                    class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd" />
                </svg>
            </div>
        </div>
        <!-- Dropdown content -->
        <div x-cloak x-show="open" @click.outside="open=false" class="pl-0 text-amber-400"
            x-bind:class="$store.sidebar.full ? expandedClass : shrinkedClass" class="text-gray-400 space-y-3">

            @can(__('models/sites.url').'.index')
                <div @click="$store.sidebar.active = 'sites'" x-data="tooltip" x-on:mouseover="show = true"
                    x-on:mouseleave="show = false"
                    class=" relative flex justify-between items-center text-gray-400 hover:text-gray-200 hover:bg-gray-800 space-x-2 rounded-md p-2 cursor-pointer
                    {{ Request::is('admin/sites*') ? 'text-gray-200 bg-gray-800' : 'text-gray-400' }}"
                    x-bind:class="{
                        'justify-start': $store.sidebar.full,
                        'sm:justify-center': !$store.sidebar.full,
                        'text-gray-200 bg-gray-800': $store.sidebar.active == 'sites',
                        'text-gray-400 ': $store.sidebar.active != 'sites'
                    }">
                    <!-- sites -->
                    <a href="{{ route(__('models/sites.url').'.index') }}"
                        class="flex justify-between p-0 w-full items-center space-x-2{{ Request::is('admin/sites*') ? 'active' : '' }}">
                        <div class="flex  items-center space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            <h3 x-cloak class="text-sm text-amber-400"
                                {{-- x-bind:class="!$store.sidebar.full && show ? visibleClass : '' || !$store.sidebar.full && !show ?'sm:hidden' : ''" --}}
                                    >
                                <span>@lang('models/sites.plural')</span>
                            </h3>

                        </div>

                    </a>
                </div>
            @endcan

            @can(__('models/siteCategs.url').'.index')
                <div @click="$store.sidebar.active = 'site-categs'" x-data="tooltip" x-on:mouseover="show = true"
                    x-on:mouseleave="show = false"
                    class=" relative flex justify-between items-center text-gray-400 hover:text-gray-200 hover:bg-gray-800 space-x-2 rounded-md p-2 cursor-pointer
                {{ Request::is('admin/'.__('models/siteCategs.plural').'*') ? 'text-gray-200 bg-gray-800' : 'text-gray-400' }}"
                    x-bind:class="{
                        'justify-start': $store.sidebar.full,
                        'sm:justify-center': !$store.sidebar.full,
                        'text-gray-200 bg-gray-800': $store.sidebar.active == 'site-categs',
                        'text-gray-400 ': $store.sidebar.active != 'site-categs'
                    }">
                    <!-- Posts -->
                    <a href="{{ route(__('models/siteCategs.url').'.index') }}"
                        class="flex justify-between p-0 w-full   items-center space-x-2{{ Request::is('admin/site-categs*') ? 'active' : '' }}">
                        <div class="flex  items-center space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            <h3 x-cloak class="text-sm text-amber-400"
                                {{-- x-bind:class="!$store.sidebar.full && show ? visibleClass : '' || !$store.sidebar.full && !show ?'sm:hidden' : ''" --}}
                                    >
                                <p>@lang('models/siteCategs.plural')</p>
                            </h3>

                        </div>
                        <h3 x-cloak x-bind:class="$store.sidebar.full ? '' : 'sm:hidden'"
                            class="w-5 h-5 p-1 bg-green-400 rounded-sm text-sm leading-3 text-center text-gray-900">5</h3>
                    </a>
                </div>
            @endcan

            @can(__('models/sitePrios.url').'.index')
                <div @click="$store.sidebar.active = 'site-prios'" x-data="tooltip" x-on:mouseover="show = true"
                    x-on:mouseleave="show = false"
                    class=" relative flex justify-between items-center text-gray-400 hover:text-gray-200 hover:bg-gray-800 space-x-2 rounded-md p-2 cursor-pointer
                {{ Request::is('admin/site-prios*') ? 'text-gray-200 bg-gray-800' : 'text-gray-400' }}"
                    x-bind:class="{
                        'justify-start': $store.sidebar.full,
                        'sm:justify-center': !$store.sidebar.full,
                        'text-gray-200 bg-gray-800': $store.sidebar.active == 'site-prios',
                        'text-gray-400 ': $store.sidebar.active != 'site-prios'
                    }">
                    <!-- Posts -->
                    <a href="{{ route(__('models/sitePrios.url').'.index') }}"
                        class="flex justify-between p-0 w-full   items-center space-x-2{{ Request::is('admin/site-prios*') ? 'active' : '' }}">
                        <div class="flex  items-center space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            <h3 x-cloak class="text-sm text-amber-400"
                                {{-- x-bind:class="!$store.sidebar.full && show ? visibleClass : '' || !$store.sidebar.full && !show ?'sm:hidden' : ''" --}}
                                    >
                                <p>@lang('models/sitePrios.plural')</p>
                            </h3>

                        </div>
                        <h3 x-cloak x-bind:class="$store.sidebar.full ? '' : 'sm:hidden'"
                            class="w-5 h-5 p-1 bg-green-400 rounded-sm text-sm leading-3 text-center text-gray-900">9</h3>
                    </a>
                </div>
            @endcan

            @can(__('models/siteTypes.url').'site-types.index')
                <div @click="$store.sidebar.active = 'site-types'" x-data="tooltip" x-on:mouseover="show = true"
                    x-on:mouseleave="show = false"
                    class=" relative flex justify-between items-center text-gray-400 hover:text-gray-200 hover:bg-gray-800 space-x-2 rounded-md p-2 cursor-pointer
                    {{ Request::is('admin/site-types*') ? 'text-gray-200 bg-gray-800' : 'text-gray-400' }}"
                    x-bind:class="{
                        'justify-start': $store.sidebar.full,
                        'sm:justify-center': !$store.sidebar.full,
                        'text-gray-200 bg-gray-800': $store.sidebar.active == 'site-types',
                        'text-gray-400 ': $store.sidebar.active != 'site-types'
                    }">
                    <!-- siteTypes -->
                    <a href="{{ route(__('models/siteTypes.url').'.index') }}"
                        class="flex justify-between p-0 w-full   items-center space-x-2{{ Request::is('admin/site-types*') ? 'active' : '' }}">
                        <div class="flex  items-center space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            <h3 x-cloak class="text-sm text-amber-400"
                                {{-- x-bind:class="!$store.sidebar.full && show ? visibleClass : '' || !$store.sidebar.full && !show ?'sm:hidden' : ''" --}}
                                    >
                                <p>@lang('models/siteTypes.plural')</p>
                            </h3>

                        </div>
                        <h3 x-cloak x-bind:class="$store.sidebar.full ? '' : 'sm:hidden'"
                            class="w-5 h-5 p-1 bg-green-400 rounded-sm text-sm leading-3 text-center text-gray-900">4</h3>
                    </a>
                </div>
            @endcan

        </div>
    </div>
@endcan

<!-- Sources -->
@canany(['regions.index', 'offices.index', 'governs.index','wilayats.index'])
<div x-data="dropdown" class="relative">
    <!-- Dropdown head -->
    <div @click="toggle('Sources')" x-data="tooltip" x-on:mouseover="show = true" x-on:mouseleave="show = false"
        class="flex justify-between text-gray-400 hover:text-gray-200 hover:bg-gray-800 items-center space-x-2 rounded-md p-2 cursor-pointer"
        x-bind:class="{
            'justify-start': $store.sidebar.full,
            'sm:justify-center': !$store.sidebar
                .full,
            'text-gray-200 bg-gray-800': $store.sidebar.active == 'Sources',
            'text-gray-400 ': $store.sidebar
                .active != 'Sources'
        }">
        <div
            class="flex justify-between p-0 w-full   items-center{{ Request::is('admin/security*') ? 'active' : '' }}">

            <div class="relative flex space-x-2 items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" />
                </svg>
                <h3 x-cloak
                    x-bind:class="!$store.sidebar.full && show ? visibleClass : '' || !$store.sidebar.full && !show ? 'sm:hidden' : ''">
                    Sources</h1>
            </div>
            <svg x-cloak x-bind:class="$store.sidebar.full ? '' : 'sm:hidden'" xmlns="http://www.w3.org/2000/svg"
                class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                    clip-rule="evenodd" />
            </svg>
        </div>
    </div>
    <!-- Dropdown content -->
    <div x-cloak x-show="open" @click.outside="open=false"
        x-bind:class="$store.sidebar.full ? expandedClass : shrinkedClass" class="text-gray-400 space-y-3">

        @can('regions.index')
            <div @click="$store.sidebar.active = 'regions'" x-data="tooltip" x-on:mouseover="show = true"
                x-on:mouseleave="show = false"
                class=" relative flex justify-between items-center text-gray-400 hover:text-gray-200 hover:bg-gray-800 space-x-2 rounded-md p-2 cursor-pointer
                {{ Request::is('admin/regions*') ? 'text-gray-200 bg-gray-800' : 'text-gray-400' }}"
                x-bind:class="{
                    'justify-start': $store.sidebar.full,
                    'sm:justify-center': !$store.sidebar.full,
                    'text-gray-200 bg-gray-800': $store.sidebar.active == 'regions',
                    'text-gray-400 ': $store.sidebar.active != 'regions'
                }">
                <!-- Posts -->
                <a href="{{ route('regions.index') }}"
                    class="flex justify-between p-0 w-full   items-center space-x-2{{ Request::is('admin/regions*') ? 'active' : '' }}">
                    <div class="flex  items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <h3 x-cloak
                            x-bind:class="!$store.sidebar.full && show ? visibleClass : '' || !$store.sidebar.full && !show ?
                                'sm:hidden' : ''">

                            <p>@lang('models/regions.plural')</p>
                        </h3>

                    </div>
                    <h3 x-cloak x-bind:class="$store.sidebar.full ? '' : 'sm:hidden'"
                        class="w-5 h-5 p-1 bg-green-400 rounded-sm text-sm leading-3 text-center text-gray-900">8</h3>
                </a>
            </div>
        @endcan

        @can('offices.index')
            <div @click="$store.sidebar.active = 'offices'" x-data="tooltip" x-on:mouseover="show = true"
                x-on:mouseleave="show = false"
                class=" relative flex justify-between items-center text-gray-400 hover:text-gray-200 hover:bg-gray-800 space-x-2 rounded-md p-2 cursor-pointer
            {{ Request::is('admin/offices*') ? 'text-gray-200 bg-gray-800' : 'text-gray-400' }}"
                x-bind:class="{
                    'justify-start': $store.sidebar.full,
                    'sm:justify-center': !$store.sidebar.full,
                    'text-gray-200 bg-gray-800': $store.sidebar.active == 'offices',
                    'text-gray-400 ': $store.sidebar.active != 'offices'
                }">
                <!-- Offices -->
                <a href="{{ route('offices.index') }}"
                    class=" flex  justify-between p-0 w-full   items-center space-x-2{{ Request::is('admin/offices*') ? 'active' : '' }}">
                    <div class="flex item-csnter">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <h3 x-cloak
                            x-bind:class="!$store.sidebar.full && show ? visibleClass : '' || !$store.sidebar.full && !show ?
                                'sm:hidden' : ''">
                            {{-- <a href="{{ route('offices.index') }}" --}}
                            {{-- class="nav-link {{ Request::is('admin/offices*') ? 'active' : '' }}"> --}}
                            <span>@lang('models/offices.plural')</span>
                            {{-- </a> --}}
                        </h3>
                    </div>

                    <h3 x-cloak x-bind:class="$store.sidebar.full ? '' : 'sm:hidden'"
                        class="w-5 h-5 p-1 bg-green-400 rounded-sm text-sm leading-3 text-center text-gray-900">8</h3>
                </a>
            </div>
        @endcan

        @can('governs.index')
            <div @click="$store.sidebar.active = 'governs'" x-data="tooltip" x-on:mouseover="show = true"
                x-on:mouseleave="show = false"
                class=" relative flex justify-between items-center text-gray-400 hover:text-gray-200 hover:bg-gray-800 space-x-2 rounded-md p-2 cursor-pointer
                {{ Request::is('admin/governs*') ? 'text-gray-200 bg-gray-800' : 'text-gray-400' }}"
                x-bind:class="{
                    'justify-start': $store.sidebar.full,
                    'sm:justify-center': !$store.sidebar.full,
                    'text-gray-200 bg-gray-800': $store.sidebar.active == 'governs',
                    'text-gray-400 ': $store.sidebar.active != 'governs'
                }">
                <!-- Governs -->
                <a href="{{ route('governs.index') }}"
                    class="flex justify-between p-0 w-full  items-center space-x-2  {{ Request::is('admin/governs*') ? 'active' : '' }}">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <h3 x-cloak
                            x-bind:class="!$store.sidebar.full && show ? visibleClass : '' || !$store.sidebar.full && !show ?
                                'sm:hidden' : ''">

                            <span>@lang('models/governs.plural')</span>

                        </h3>

                    </div>
                    <h3 x-cloak x-bind:class="$store.sidebar.full ? '' : 'sm:hidden'"
                        class="w-5 h-5 p-1 bg-green-400 rounded-sm text-sm leading-3 text-center text-gray-900">8</h3>
                </a>
            </div>
        @endcan

        @can('wilayats.index')
            <div @click="$store.sidebar.active = 'wilayats'" x-data="tooltip" x-on:mouseover="show = true"
                x-on:mouseleave="show = false"
                class=" relative flex justify-between items-center text-gray-400 hover:text-gray-200 hover:bg-gray-800 space-x-2 rounded-md p-2 cursor-pointer
                                     {{ Request::is('admin/wilayats*') ? 'text-gray-200 bg-gray-800' : 'text-gray-400' }}"
                x-bind:class="{
                    'justify-start': $store.sidebar.full,
                    'sm:justify-center': !$store.sidebar.full,
                    'text-gray-200 bg-gray-800': $store.sidebar.active == 'wilayats',
                    'text-gray-400 ': $store.sidebar.active != 'wilayats'
                }">
                <!-- Posts -->
                <a href="{{ route('wilayats.index') }}"
                    class="flex justify-between p-0 w-full   items-center space-x-2{{ Request::is('admin/wilayats*') ? 'active' : '' }}">
                    <div class="flex  items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <h3 x-cloak
                            x-bind:class="!$store.sidebar.full && show ? visibleClass : '' || !$store.sidebar.full && !show ?
                                'sm:hidden' : ''">
                            <p>@lang('models/wilayats.plural')</p>
                        </h3>

                    </div>
                    <h3 x-cloak x-bind:class="$store.sidebar.full ? '' : 'sm:hidden'"
                        class="w-5 h-5 p-1 bg-green-400 rounded-sm text-sm leading-3 text-center text-gray-900">8</h3>
                </a>
            </div>
        @endcan

    </div>
</div>
@endcan

<!-- Builder -->
@can('generator_builder.index')
    @php
    $isUserActive = Request::is($urlAdmin . '*generator_builder*');
    @endphp
    <div @click="$store.sidebar.active = 'generator_builder' " x-data="tooltip" x-on:mouseover="show = true"
        x-on:mouseleave="show = false"
        class=" relative flex justify-between items-center text-gray-400 hover:text-gray-200 hover:bg-gray-800 space-x-2 rounded-md p-2 cursor-pointer"
        x-bind:class="{
            'justify-start': $store.sidebar.full,
            'sm:justify-center': !$store.sidebar
                .full,
            'text-gray-200 bg-gray-800': $store.sidebar.active == 'generator_builder',
            'text-gray-400 ': $store.sidebar
                .active != 'generator_builder'
        }">
        <a class="flex  items-center  p-0 w-full  space-x-2 nav-link {{ $isUserActive ? 'active' : '' }}" href="{{ route('generator_builder.index') }}" >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
                <h3 x-cloak class="text-sm text-yellow-400"
                    x-bind:class="!$store.sidebar.full && show ? visibleClass : '' || !$store.sidebar.full && !show ? 'sm:hidden' : ''">
                    @lang('menu.generator_builder.title')
                </h3>
        </a>
        {{-- <div x-cloak x-bind:class="$store.sidebar.full ? '' : 'sm:hidden'" class="flex items-center space-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                    d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <h1 class="w-5 h-5 p-1 bg-pink-400 rounded-sm text-sm leading-3 text-center text-gray-900">3
            </h1>

        </div> --}}
    </div>
@endcan

<!-- fileUploads -->
@can('fileUploads.index')
    <div @click="$store.sidebar.active = 'fileUploads'" x-data="tooltip" x-on:mouseover="show = true"
        x-on:mouseleave="show = false"
        class=" relative flex justify-between items-center text-gray-400 hover:text-gray-200 hover:bg-gray-800 space-x-2 rounded-md p-2 cursor-pointer
    {{ Request::is('admin/fileUploads*') ? 'text-gray-200 bg-gray-800' : 'text-gray-400' }}"
        x-bind:class="{
            'justify-start': $store.sidebar.full,
            'sm:justify-center': !$store.sidebar.full,
            'text-gray-200 bg-gray-800': $store.sidebar.active == 'fileUploads',
            'text-gray-400 ': $store.sidebar.active != 'fileUploads'
        }">
        <!-- Posts -->
        {{-- <a href="{{ route('fileUploads.index') }}" class="flex justify-between p-0 w-full  items-center space-x-2{{ Request::is('admin/fileUploads*') ? 'active' : '' }}"> --}}
        <a href="{{ route('fileUploads.index') }}" class="flex  items-center  p-0 w-full  space-x-2 nav-link {{ Request::is('admin/fileUploads*') ? 'active' : '' }}"  >

            {{-- <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg> --}}
                <i class="nav-icon fas fa-file-alt"></i>
                <h3 x-cloak class="text-sm"
                    x-bind:class="!$store.sidebar.full && show ? visibleClass : '' || !$store.sidebar.full && !show ? 'sm:hidden' : ''">
                    <p>@lang('models/fileUploads.plural')</p>
                </h3>
        </a>
    </div>
@endcan

<!-- site-snags -->
@can('site-snags.index')
    <div @click="$store.sidebar.active = 'site-snags'" x-data="tooltip" x-on:mouseover="show = true"
        x-on:mouseleave="show = false"
        class=" relative flex justify-between items-center text-gray-400 hover:text-gray-200 hover:bg-gray-800 space-x-2 rounded-md p-2 cursor-pointer
        {{ Request::is('admin/site-snags*') ? 'text-gray-200 bg-gray-800' : 'text-gray-400' }}"
        x-bind:class="{
            'justify-start': $store.sidebar.full,
            'sm:justify-center': !$store.sidebar.full,
            'text-gray-200 bg-gray-800': $store.sidebar.active == 'site-snags',
            'text-gray-400 ': $store.sidebar.active != 'site-snags'
        }">
        <!-- Posts -->
        <a href="{{ route('site-snags.index') }}"
            class="flex justify-between p-0 w-full   items-center space-x-2{{ Request::is('admin/site-snags*') ? 'active' : '' }}">
            <div class="flex  items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <h3 x-cloak class="text-base"
                    x-bind:class="!$store.sidebar.full && show ? visibleClass : '' || !$store.sidebar.full && !show ? 'sm:hidden' : ''">
                    <p>@lang('models/siteSnags.plural')</p>
                </h3>

            </div>

        </a>
    </div>
@endcan
<!-- Battery-add -->

@can('batteryAdds.index')
    <div @click="$store.sidebar.active = 'site-snags'" x-data="tooltip" x-on:mouseover="show = true"
        x-on:mouseleave="show = false"
        class=" relative flex justify-between items-center text-gray-400 hover:text-gray-200 hover:bg-gray-800 space-x-2 rounded-md p-2 cursor-pointer
        {{ Request::is('admin/batteryAdds*') ? 'text-gray-200 bg-gray-800' : 'text-gray-400' }}"
        x-bind:class="{
            'justify-start': $store.sidebar.full,
            'sm:justify-center': !$store.sidebar.full,
            'text-gray-200 bg-gray-800': $store.sidebar.active == 'site-snags',
            'text-gray-400 ': $store.sidebar.active != 'site-snags'
        }">
        <!-- Posts -->
        <a href="{{ route('batteryAdds.index') }}"
            class="flex justify-between p-0 w-full   items-center space-x-2{{ Request::is('admin/batteryAdds*') ? 'active' : '' }}">
            <div class="flex  items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <h3 x-cloak class="text-base"
                    x-bind:class="!$store.sidebar.full && show ? visibleClass : '' || !$store.sidebar.full && !show ? 'sm:hidden' : ''">
                    <p>@lang('models/batteryAdds.plural')</p>
                </h3>

            </div>

        </a>
    </div>
@endcan

<!-- Posts -->
{{-- <div @click="$store.sidebar.active = 'posts' " x-data="tooltip" x-on:mouseover="show = true"
    x-on:mouseleave="show = false"
    class=" relative flex justify-between items-center text-gray-400 hover:text-gray-200 hover:bg-gray-800 space-x-2 rounded-md p-2 cursor-pointer"
    x-bind:class="{'justify-start': $store.sidebar.full, 'sm:justify-center':!$store.sidebar.full,'text-gray-200 bg-gray-800':$store.sidebar.active == 'posts','text-gray-400 ':$store.sidebar.active != 'posts'}">
    <div class="flex  items-center space-x-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
        </svg>
        <h1 x-cloak
            x-bind:class="!$store.sidebar.full && show ? visibleClass :'' || !$store.sidebar.full && !show ? 'sm:hidden':''">
            Posts</h1>
    </div>
    <h1 x-cloak x-bind:class="$store.sidebar.full ? '' :'sm:hidden'"
        class="w-5 h-5 p-1 bg-green-400 rounded-sm text-sm leading-3 text-center text-gray-900">8</h1>
</div> --}}

<!-- Schedules -->
{{-- <div @click="$store.sidebar.active = 'home' " x-data="tooltip" x-on:mouseover="show = true"
    x-on:mouseleave="show = false"
    class=" relative flex justify-between items-center text-gray-400 hover:text-gray-200 hover:bg-gray-800 space-x-2 rounded-md p-2 cursor-pointer"
    x-bind:class="{'justify-start': $store.sidebar.full, 'sm:justify-center':!$store.sidebar.full,'text-gray-200 bg-gray-800':$store.sidebar.active == 'schedules','text-gray-400 ':$store.sidebar.active != 'schedules'}">
    <div class="flex  items-center space-x-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
        </svg>
        <h1 x-cloak
            x-bind:class="!$store.sidebar.full && show ? visibleClass :'' || !$store.sidebar.full && !show ? 'sm:hidden':''">
            Leave</h1>
    </div>
    <div x-cloak x-bind:class="$store.sidebar.full ? '':'sm:hidden'" class="flex items-center space-x-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <h1 class="w-5 h-5 p-1 bg-pink-400 rounded-sm text-sm leading-3 text-center text-gray-900">3
        </h1>

    </div>
</div> --}}

<!-- Promote -->
{{-- <div x-data="dropdown" class="relative">
                    <!-- Dropdown head -->
                    <div @click="toggle('promote')" x-data="tooltip" x-on:mouseover="show = true"
                        x-on:mouseleave="show = false"
                        class="flex justify-between text-gray-400 hover:text-gray-200 hover:bg-gray-800 items-center space-x-2 rounded-md p-2 cursor-pointer"
                        x-bind:class="{'justify-start': $store.sidebar.full, 'sm:justify-center':!$store.sidebar.full,'text-gray-200 bg-gray-800':$store.sidebar.active == 'promote','text-gray-400 ':$store.sidebar.active != 'promote'}">
                        <div class="relative flex space-x-2 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                            </svg>
                            <h1 x-cloak
                                x-bind:class="!$store.sidebar.full && show ? visibleClass :'' || !$store.sidebar.full && !show ? 'sm:hidden':''">
                                Promote</h1>
                        </div>
                        <svg x-cloak x-bind:class="$store.sidebar.full ? '':'sm:hidden'"
                            xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <!-- Dropdown content -->
                    <div x-cloak x-show="open" @click.outside="open=false"
                        x-bind:class="$store.sidebar.full ? expandedClass : shrinkedClass"
                        class="text-gray-400 space-y-3">
                        <h1 class="hover:text-gray-200 cursor-pointer">Item 1</h1>
                        <h1 class="hover:text-gray-200 cursor-pointer">Item 2</h1>
                        <h1 class="hover:text-gray-200 cursor-pointer">Item 3</h1>
                        <h1 class="hover:text-gray-200 cursor-pointer">Item 4</h1>
                    </div>
                </div> --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tailwind Admin Template</title>
    <meta name="author" content="Karim Saleh">
    <meta name="description" content="Ooredoo KPIs">

    <!-- Tailwind -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/nice-select2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style_nice.css') }}"> --}}
    {{-- <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script> --}}

    @livewireStyles
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <style>
        .dataTables_wrapper {
            margin: 20px;
        }

        .required:after {
            content: '(*)';
            color: red;
            padding-left: 5px;
        }

    </style>
    @stack('page_css')
    @stack('third_party_stylesheets')
    <!-- AlpineJS -->
    <!-- Alpine Js -->
    {{-- <script  src="https://unpkg.com/alpinejs@3.2.4/dist/cdn.min.js"></script> --}}
    {{-- <SCript src="{{asset("js/alpine.js")}}"></SCript> --}}
    {{-- <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script> --}}

    <style>
        /* @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');
        .font-family-karla { font-family: karla; }
        .bg-sidebar { background: #3d68ff; }
        .cta-btn { color: #3d68ff; }
        .upgrade-btn { background: #1947ee; }
        .upgrade-btn:hover { background: #0038fd; }
        .active-nav-link { background: #1947ee; }
        .nav-item:hover { background: #1947ee; }
        .account-link:hover { background: #3d68ff; } */

    </style>
    <!-- hide elements while page load -->
    <style>
        [x-cloak] {
            display: none;
        }

    </style>
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
        integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}

</head>

<body class="bg-gray-100 font-family-karla h-screen mx-auto antialiased  @stack('page_body_class')" x-data>
    <div class="flex justify-between">
        {{-- <aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl"> --}}
        <div class="h-screen bg-gray-900 transition-all  w-64 duration-300 space-y-2 fixed sm:relative"
            x-bind:class="{'w-64':$store.sidebar.full, 'w-64 sm:w-20':!$store.sidebar.full,'top-0 left-0':$store.sidebar.navOpen,'top-0 -left-64 sm:left-0':!$store.sidebar.navOpen}">

            <h1 class="text-white font-black py-4"
                x-bind:class="$store.sidebar.full ? 'text-2xl px-4' : 'text-xl px-4 xm:px-2'">LOGO</h1>

            <div class="px-4 space-y-2">

                <!-- SideBar Toggle -->
                <button @click="$store.sidebar.full = !$store.sidebar.full"
                    class="hidden sm:block focus:outline-none absolute p-1 -right-3 top-10 bg-gray-900 rounded-full shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-4 w-4 transition-all duration-300 text-white transform"
                        x-bind:class="$store.sidebar.full ? 'rotate-90':'-rotate-90 '" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
                <!-- Home -->
                <div x-data="tooltip" x-on:mouseover="show = true" x-on:mouseleave="show = false"
                    @click="$store.sidebar.active = 'home' "
                    class=" relative flex items-center hover:text-gray-200 hover:bg-gray-800 space-x-2 rounded-md p-2 cursor-pointer"
                    x-bind:class="{'justify-start': $store.sidebar.full, 'sm:justify-center':!$store.sidebar.full,'text-gray-200 bg-gray-800':$store.sidebar.active == 'home','text-gray-400 ':$store.sidebar.active != 'home'}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <h1 x-cloak
                        x-bind:class="!$store.sidebar.full && show ? visibleClass :'' || !$store.sidebar.full && !show ? 'sm:hidden':''">
                        Dashboard</h1>
                </div>

                <!-- Audience -->
                <div x-data="dropdown" class="relative">
                    <!-- Dropdown head -->
                    <div @click="toggle('audience')" x-data="tooltip" x-on:mouseover="show = true"
                        x-on:mouseleave="show = false"
                        class="flex justify-between text-gray-400 hover:text-gray-200 hover:bg-gray-800 items-center space-x-2 rounded-md p-2 cursor-pointer"
                        x-bind:class="{'justify-start': $store.sidebar.full, 'sm:justify-center':!$store.sidebar.full, 'text-gray-200 bg-gray-800':$store.sidebar.active == 'audience','text-gray-400 ':$store.sidebar.active != 'audience'}">
                        <div class="relative flex space-x-2 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            <h1 x-cloak
                                x-bind:class="!$store.sidebar.full && show ? visibleClass :'' || !$store.sidebar.full && !show ? 'sm:hidden':''">
                                Audience</h1>
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
                    <div x-cloak x-show="open" @click.outside="open =false"
                        x-bind:class="$store.sidebar.full ? expandedClass : shrinkedClass"
                        class="text-gray-400 space-y-3 ">
                        <h1 class="hover:text-gray-200 cursor-pointer">Item 1</h1>
                        <h1 class="hover:text-gray-200 cursor-pointer">Item 2</h1>
                        <h1 class="hover:text-gray-200 cursor-pointer">Item 3</h1>
                        <h1 class="hover:text-gray-200 cursor-pointer">Item 4</h1>
                    </div>
                </div>

                <!-- Posts -->
                <div @click="$store.sidebar.active = 'posts' " x-data="tooltip" x-on:mouseover="show = true"
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
                </div>

                <!-- Schedules -->
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
                        <h1 x-cloak
                            x-bind:class="!$store.sidebar.full && show ? visibleClass :'' || !$store.sidebar.full && !show ? 'sm:hidden':''">
                            Schedules</h1>
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

                <!-- Income -->
                <div x-data="dropdown" class="relative">
                    <!-- Dropdown head -->
                    <div @click="toggle('income')" x-data="tooltip" x-on:mouseover="show = true"
                        x-on:mouseleave="show = false"
                        class="flex justify-between text-gray-400 hover:text-gray-200 hover:bg-gray-800 items-center space-x-2 rounded-md p-2 cursor-pointer"
                        x-bind:class="{'justify-start': $store.sidebar.full, 'sm:justify-center':!$store.sidebar.full,'text-gray-200 bg-gray-800':$store.sidebar.active == 'income','text-gray-400 ':$store.sidebar.active != 'income'}">
                        <div class="relative flex space-x-2 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" />
                            </svg>
                            <h1 x-cloak
                                x-bind:class="!$store.sidebar.full && show ? visibleClass :'' || !$store.sidebar.full && !show ? 'sm:hidden':''">
                                Income</h1>
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
                        <!-- Sub Dropdown  -->
                        <div x-data="sub_dropdown" class="relative w-full ">
                            <div @click="sub_toggle()" class="flex items-center justify-between cursor-pointer">
                                <h1 class="hover:text-gray-200 cursor-pointer">Item 3</h1>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div x-show="sub_open" @click.outside="sub_open = false"
                                x-bind:class="$store.sidebar.full ? sub_expandedClass:sub_shrinkedClass">
                                <h1 class="hover:text-gray-200 cursor-pointer ">Sub Item 1</h1>
                                <h1 class="hover:text-gray-200 cursor-pointer ">Sub Item 2</h1>
                                <h1 class="hover:text-gray-200 cursor-pointer ">Sub Item 3</h1>
                            </div>
                        </div>
                        <h1 class="hover:text-gray-200 cursor-pointer">Item 4</h1>
                    </div>
                    @include('layouts.menu')
                </div>

                <!-- Promote -->
                <div x-data="dropdown" class="relative">
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
                </div>
            </div>
        </div>

        {{-- </aside> --}}
        <div class="relative w-full flex flex-col h-screen overflow-y-hidden ">

            <!-- Desktop Header -->
            <header class="w-full items-center bg-white py-2 px-6 hidden sm:flex">
                <!-- Mobile Menu Toggle -->
                <button @click="$store.sidebar.navOpen = !$store.sidebar.navOpen"
                    class="sm:hidden absolute top-5 right-5 focus:outline-none">
                    <!-- Menu Icons -->
                    {{-- <i class="far fa-arrow-alt-square-right"></i> --}}
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                        x-bind:class="$store.sidebar.navOpen ? 'hidden':''" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>

                    <!-- Close Menu -->
                    <svg x-cloak xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                        x-bind:class="$store.sidebar.navOpen ? '':'hidden'" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <div class="w-1/2"></div>
                <div x-data="{ isOpen: false }" class="relative w-1/2 flex justify-end">
                    <button @click="isOpen = !isOpen"
                        class="realtive z-10 w-12 h-12 rounded-full overflow-hidden border-4 border-gray-400 hover:border-gray-300 focus:border-gray-300 focus:outline-none">
                        <img src="https://source.unsplash.com/uJ8LNVCBjFQ/400x400">
                    </button>
                    <button x-show="isOpen" @click="isOpen = false"
                        class="h-full w-full fixed inset-0 cursor-default"></button>
                    <div x-show="isOpen" class="absolute w-32 bg-white rounded-lg shadow-lg py-2 mt-16">
                        <a href="#" class="block px-4 py-2 account-link hover:text-white">Account</a>
                        <a href="#" class="block px-4 py-2 account-link hover:text-white">Support</a>
                        <a href="#" class="block px-4 py-2 account-link hover:text-white">Sign Out</a>
                    </div>
                </div>
            </header>

            <!-- Mobile Header & Nav -->
            <header x-data="{ isOpen: false }" class="w-full bg-sidebar py-5 px-6 sm:hidden">
                <div class="flex items-center justify-between">
                    <a href="index.html"
                        class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Admin</a>
                    <button @click="isOpen = !isOpen" class="text-white text-3xl focus:outline-none">
                        <i x-show="!isOpen" class="fas fa-arrow-alt-circle-right"></i>
                        <i x-show="isOpen" class="fas fa-times"></i>
                    </button>
                </div>

                <!-- Dropdown Nav -->
                <nav :class="isOpen ? 'flex': 'hidden'" class="flex flex-col pt-4">
                    <a href="index.html"
                        class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                        <i class="fas fa-tachometer-alt mr-3"></i>
                        Dashboard
                    </a>
                    <a href="blank.html"
                        class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                        <i class="fas fa-sticky-note mr-3"></i>
                        Blank Page
                    </a>
                    <a href="tables.html" class="flex items-center active-nav-link text-white py-2 pl-4 nav-item">
                        <i class="fas fa-table mr-3"></i>
                        Tables
                    </a>
                    <a href="forms.html"
                        class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                        <i class="fas fa-align-left mr-3"></i>
                        Forms
                    </a>
                    <a href="tabs.html"
                        class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                        <i class="fas fa-tablet-alt mr-3"></i>
                        Tabbed Content
                    </a>
                    <a href="calendar.html"
                        class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                        <i class="fas fa-calendar mr-3"></i>
                        Calendar
                    </a>
                    <a href="#" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                        <i class="fas fa-cogs mr-3"></i>
                        Support
                    </a>
                    <a href="#" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                        <i class="fas fa-user mr-3"></i>
                        My Account
                    </a>
                    <a href="#" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                        <i class="fas fa-sign-out-alt mr-3"></i>
                        Sign Out
                    </a>
                    <button
                        class="w-full bg-white cta-btn font-semibold py-2 mt-3 rounded-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                        <i class="fas fa-arrow-circle-up mr-3"></i> Upgrade to Pro!
                    </button>
                </nav>
                <!-- <button class="w-full bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                <i class="fas fa-plus mr-3"></i> New Report
            </button> -->
            </header>
            <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
                <main class="w-full relative flex-grow p-6">
                    <div class="transition-all duration-300 absolute top-2 right-1/2  bg-stone-200 text-sm text-blue-900 p-2 border-l-8 border-stone-600 rounded-md opacity-80" wire:loading >
                        Processing Payment...
                        <svg class="inline-block animate-spin -mr-1 ml-3 h-5 w-5 text-amber-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                           <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                           <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                       </svg>
                   </div>
                    @yield('content')
                </main>
            </div>
        </div>
    </div>
    @livewireScripts()
    <script src="{{ mix('js/app.js') }}"></script>



    <script>
        window.addEventListener('toast', event => {
            Toastify({
                text: event.detail.id,
                duration: 3000,
                // destination: "https://github.com/apvarun/toastify-js",
                newWindow: true,
                close: true,
                // gravity: "top", // `top` or `bottom`
                // position: "center", // `left`, `center` or `right`
                stopOnFocus: true, // Prevents dismissing of toast on hover
                className: 'absolute bg-yellow-100 p-2 border-l-2 border-orange-400 right-4 top-20 z-50',
                style: {

                },
                onClick: function() {} // Callback after click
            }).showToast();
        });
    </script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"
        integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
    {{-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}
    {{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}
    <script>
        window.addEventListener('swal:modal', event => {
            swal({
                title: event.detail.title,
                text: event.detail.text,
                icon: event.detail.type,
            });

        });

        window.addEventListener('swal:confirms', event => {
            swal({
                    title: event.detail.title,
                    text: event.detail.text,
                    icon: event.detail.type,
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.livewire.emit('delete', event.detail.id);
                    }
                });
            //
        });
        //     const chart = new Chart(ctx, {
        //     type: 'line',
        //     data: data,
        //     options: {
        //       onClick: (e) => {
        //         const canvasPosition = getRelativePosition(e, chart);

        //         // Substitute the appropriate scale IDs
        //         const dataX = chart.scales.x.getValueForPixel(canvasPosition.x);
        //         const dataY = chart.scales.y.getValueForPixel(canvasPosition.y);
        //       }
        //     }
        //   });
    </script>
    @stack('third_party_scripts')
    @stack('page_scripts')
</body>

</html>

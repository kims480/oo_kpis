<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALKAN East</title>
    <meta name="author" content="Karim Saleh">
    <meta name="description" content="Alkan East">
    <!-- Tailwind -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />


    @livewireStyles

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

</head>

<body class="bg-gray-100 font-family-karla h-screen mx-auto antialiased  @stack('page_body_class')" x-data>
    <div class="flex justify-between overflow-hidden ">
        {{-- <aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl"> --}}
        <div class="h-screen bg-gray-900 transition-all  w-64 duration-300 space-y-2 fixed sm:relative  "
            x-bind:class="{'w-64':$store.sidebar.full, 'w-64 sm:w-20':!$store.sidebar.full,'top-0 left-0':$store.sidebar.navOpen,'top-0 -left-64 sm:left-0':!$store.sidebar.navOpen}">

            <h1 class="text-white uppercase font-black py-4 flex"
                x-bind:class="$store.sidebar.full ? 'text-2xl px-4' : 'text-xs px-1 xm:px-1'"><span>{{ env('APP_NAME') }}</span></h1>

            <div class="px-2 space-y-1 {{-- scrollbar-thin overflow-y-clip  scrollbar-thumb-slate-700 scrollbar-track-slate-500 --}}" style="max-height: 85vh;">

                <!-- SideBar Toggle -->
                <button @click="$store.sidebar.full = !$store.sidebar.full"
                    class="hidden sm:block focus:outline-none  absolute z-10 p-1 -right-4 top-10 bg-slate-50 rounded-full shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-6 w-6 transition-all duration-300 text-slate-800  transform"
                        x-bind:class="$store.sidebar.full ? 'rotate-90':'-rotate-90 '" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </button>

                @include('layouts.menu_2')

            </div>
        </div>

        {{-- </aside> --}}
        <div class="relative w-full flex flex-col h-screen overflow-y-hidden ">

            <!-- Desktop Header -->
            <header class="w-full items-center bg-white py-2 px-6 hidden sm:flex">
                <!-- Mobile Menu Toggle -->
                <button @click="$store.sidebar.navOpen = !$store.sidebar.navOpen"
                    class="sm:hidden absolute top-5 right-5 focus:outline-none  bg-slate-300 rounded-full shadow-md">
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
                    <p>
                        {{ Auth::user()->name }} <br>
                        <small>Member since {{ Auth::user()->created_at->format('M. Y') }}</small>
                    </p>
                    <button @click="isOpen = !isOpen"
                        class="realtive z-10 w-12 h-12 rounded-full overflow-hidden border-4 border-gray-400 hover:border-gray-300 focus:border-gray-300 focus:outline-none">
                        <img src="https://source.unsplash.com/uJ8LNVCBjFQ/400x400">
                    </button>

                    <button x-show="isOpen" @click="isOpen = false"
                        class="h-full w-full fixed inset-0 cursor-default"></button>

                    <div x-show="isOpen" class="absolute z-30 flex flex-col w-32 bg-white rounded-lg shadow-lg py-2 mt-16">
                        <a href="{{ route('users.profile') }}"
                            class=" px-4 py-2 account-link hover:text-slate-800 hover:font-semibold hover:cursor-pointer">Profile</a>
                        <a href="#" class=" px-4 py-2 account-link hover:text-slate-800 hover:font-semibold hover:cursor-pointer"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Sign out
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                            class="d-none">
                            @csrf
                        </form>
                        {{-- <a href="#" class="block px-4 py-2 account-link hover:text-white">Account</a>
                        <a href="#" class="block px-4 py-2 account-link hover:text-white">Support</a> --}}
                        {{-- <a href="{{ route('signout') }}" class="block px-4 py-2 account-link hover:text-white">Sign Out</a> --}}
                    </div>
                </div>
            </header>

            <!-- Mobile Header & Nav -->
            <header x-data="{ isOpen: false }" class="w-full bg-sidebar py-5 px-6 sm:hidden bg-slate-900 text-sky-50">
                <div class="flex items-center justify-between ">
                    <a href="index.html" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">ALKAN
                        East</a>
                    <button @click="isOpen = !isOpen" class="text-white text-3xl focus:outline-none">
                        <i x-show="!isOpen" class="fas fa-arrow-alt-circle-right"></i>
                        <i x-show="isOpen" class="fas fa-times"></i>
                    </button>
                </div>

                <!-- Dropdown Nav -->
                <nav :class="isOpen ? 'flex': 'hidden'" class="flex flex-col pt-4 bg-slate-800">
                    <a href="{{route('dashboard')}}"
                        class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                        <i class="fas fa-tachometer-alt mr-3"></i>
                        Dashboard
                    </a>
                    <a href="{{ route('site-snags.index') }}"
                        class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                        <i class="fas fa-sticky-note mr-3"></i>
                        Snags
                    </a>
                    <a href="{{ route('site-snags.create') }}"
                        class="flex items-center active-nav-link text-white py-2 pl-4 nav-item">
                        <i class="fas fa-table mr-3"></i>
                        Add Snag
                    </a>

                    <a href="{{-- {{ route('user.profile') }} --}}"
                        class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                        <i class="fas fa-user mr-3"></i>
                        My Profile
                    </a>
                    <a href="#"
                        class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt mr-3"></i>
                        Sign Out
                    </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                    class="d-none">
                    @csrf
                </form>
                    {{-- <button
                        class="w-full bg-white cta-btn font-semibold py-2 mt-3 rounded-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                        <i class="fas fa-arrow-circle-up mr-3"></i> Upgrade to Pro!
                    </button> --}}
                </nav>
                <!-- <button class="w-full bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                <i class="fas fa-plus mr-3"></i> New Report
            </button> -->
            </header>

            <div class="w-full h-screen overflow-x-hidden border-t flex flex-col overflow-y-clip  scrollbar-thin  scrollbar-thumb-slate-700 scrollbar-track-slate-500">
                <main class="w-full relative flex-grow p-6">
                    <div class="transition-all duration-300 absolute top-2 right-1/2  bg-stone-200 text-sm text-blue-900 p-2 border-l-8 border-stone-600 rounded-md opacity-80"
                        wire:loading>
                        Processing Data...
                        <svg class="inline-block animate-spin -mr-1 ml-3 h-5 w-5 text-amber-400"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                            </path>
                        </svg>
                    </div>
                    {{-- {{$slot}} --}}
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

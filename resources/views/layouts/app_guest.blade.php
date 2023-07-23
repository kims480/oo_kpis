<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALKAN East</title>
    <meta name="author" content="Karim Saleh">
    <meta name="description" content="Alkan East">
    <!-- Tailwind -->
    {{-- <link rel="stylesheet" href="{{ asset('css/choices.css') }}"> --}}
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

        .swal-wide {
            transform: scale(0.8)
        }
        body{
            /* background-image: url(/images/login_5.jpeg);
            background-blend-mode: overlay; */
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

<body class="bg-slate-100 font-family-karla h-screen mx-auto antialiased  @stack('page_body_class')" x-data>
    <div class="flex justify-between overflow-hidden ">
        {{-- <aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl"> --}}
        <div class="sidebar"
            x-bind:class="{
                'w-64': $store.sidebar.full,
                'w-64 sm:w-20': !$store.sidebar.full,
                'top-0 left-0': $store.sidebar
                    .navOpen,
                'top-0 -left-64 sm:left-0': !$store.sidebar.navOpen
            }">

            <h1 class="text-white uppercase font-black py-4 flex"
                x-bind:class="$store.sidebar.full ? 'text-2xl px-4' : 'text-xs px-1 xm:px-1'">
                <span>{{ env('APP_NAME') }}</span>
            </h1>


        </div>
        <div
        class="w-full h-screen overflow-x-hidden border-t flex flex-col overflow-y-clip  scrollbar-thin  scrollbar-thumb-slate-700 scrollbar-track-slate-500">
        <main class="w-full relative flex-grow p-6">
            <div class="transition-all duration-300 absolute top-2 right-1/2  bg-stone-200 text-sm text-blue-900 p-2 border-l-8 border-stone-600 rounded-md opacity-80"
                wire:loading>
                Processing Data...
                <svg class="inline-block animate-spin -mr-1 ml-3 h-5 w-5 text-amber-400"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10"
                        stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor"
                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                    </path>
                </svg>
            </div>
            {{-- {{$slot}} --}}
            @yield('content')
            {{-- {{ $slot }} --}}
        </main>
    </div>



    @livewireScripts()
    @wireUiScripts()
    <script src="{{ mix('js/app.js') }}"></script>
    @stack('scripts')
    <script>
        window.addEventListener('SelectSearch', event => {

            let singleSelect = document.querySelectorAll("select.searchSelection");
            console.log('singleSelect');
            // console.log(singleSelect);
            singleSelect.forEach(element => {

                    new TESelect(element);
                    console.log('newInstance');


            });

        })

        let singleSelect = document.querySelectorAll("select.searchSelection");
            console.log('singleSelect');
            // console.log(singleSelect);
            singleSelect.forEach(element => {

                    new TESelect(element);
                    console.log('newInstance');


            });

    </script>



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

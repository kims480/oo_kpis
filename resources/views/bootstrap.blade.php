<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @livewireStyles
</head>
<body>
<div id="app">
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header"><h3>Reusable Parent-Child Dependent Dropdowns: Bootstrap Version</h3></div>

                        <div class="card-body">
                            <div class="alert alert-info mb-4">
                                Fill in the form. Choose the country, and cities list will be updated.
                            </div>
                            <form action="/journey" method="POST" class="border-b-2 pb-10">
                                @csrf
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Your Journey Name</label>

                                    <div class="col-md-6">
                                        <input name="name" type="text" class="form-control" required />
                                    </div>
                                </div>

                                @livewire('parent-child', [
                                    'parentModelName' => 'App\\Models\\Country',
                                    'parentLabel' => 'Country From',
                                    'parentInputName' => 'country_from',
                                    'childModelName' => 'App\\Models\\City',
                                    'childLabel' => 'City From',
                                    'childInputName' => 'city_from',
                                    'relationshipFieldName' => 'country_id',
                                    'designTemplate' => 'bootstrap',
                                ])

                                @livewire('parent-child', [
                                    'parentModelName' => 'App\\Models\\Country',
                                    'parentLabel' => 'Country To',
                                    'parentInputName' => 'country_to',
                                    'childModelName' => 'App\\Models\\City',
                                    'childLabel' => 'City To',
                                    'childInputName' => 'city_to',
                                    'relationshipFieldName' => 'country_id',
                                    'designTemplate' => 'bootstrap',
                                ])

                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Add Journey
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="mt-3 text-center">
                        <a href="{{ route('tailwind') }}">See Tailwind version</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
@livewireScripts
</body>
</html>

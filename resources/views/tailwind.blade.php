<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Reusable Parent-Child Dependent Dropdowns</title>

    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

    @livewireStyles
</head>
<body class="bg-gray-100">
<div class="font-sans text-gray-900 antialiased">
    <div class="flex flex-col sm:justify-center items-center pt-5 pb-5">
        <h2 class="font-bold text-2xl">Reusable Parent-Child Dependent Dropdowns: Tailwind Version</h2>

        <div class="w-full sm:max-w-xl mt-6 mb-6 px-6 py-8 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <form action="/journey" method="POST" class="border-b-2 pb-10">
                @csrf
                <div>
                    <label class="block font-medium text-sm text-gray-700" for="name">
                        Your Journey Name
                    </label>
                    <input name="name" type="text"
                           class="mt-2 text-sm sm:text-base pl-2 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" required />
                </div>

                @livewire('parent-child', [
                    'parentModelName' => 'App\\Models\\Country',
                    'parentLabel' => 'Country From',
                    'parentInputName' => 'country_from',
                    'childModelName' => 'App\\Models\\City',
                    'childLabel' => 'City From',
                    'childInputName' => 'city_from',
                    'relationshipFieldName' => 'country_id',
                ])

                @livewire('parent-child', [
                    'parentModelName' => 'App\\Models\\Country',
                    'parentLabel' => 'Country To',
                    'parentInputName' => 'country_to',
                    'childModelName' => 'App\\Models\\City',
                    'childLabel' => 'City To',
                    'childInputName' => 'city_to',
                    'relationshipFieldName' => 'country_id',
                ])

                <div class="flex items-center mt-4">
                    <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                        Add Journey
                    </button>
                </div>
            </form>
        </div>

        <a href="{{ route('bootstrap') }}">See Bootstrap version</a>
    </div>
</div>
@livewireScripts

</body>
</html>

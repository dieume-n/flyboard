<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Flyboard') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>

<body class="text-gray-800 h-screen antialiased">
    <nav class="top-0 absolute z-50 w-full">
        <div class="px-4 sm:px6 md:container mx-auto">
            <div class="flex justify-between items-center h-16">
                <div>
                    <a href="{{ url('/') }}" class="text-white text-xl font-semibold">
                        {{ config('app.name', 'Birdboard') }}
                    </a>
                </div>

                <div class="flex items-center">
                    @guest
                    <div class="ml-10 flex items-baseline">
                        <a href="{{ route('login') }}" class="px-3 py-2 rounded-md text-sm font-medium text-white hover:bg-gray-800 focus:outline-none
                focus:text-white focus:bg-gray-700">
                            {{ __('Login') }}
                        </a>
                        @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-2 btn btn-indigo">
                            {{ __('Register') }}
                        </a>
                        @endif
                    </div>
                    @endguest
                </div>
            </div>
        </div>
    </nav>
    <main>
        <div class="relative pt-16 pb-32 flex content-center items-center justify-center" style="min-height: 75vh;">
            <div class="absolute top-0 w-full h-full bg-center bg-cover"
                style='background-image: url("https://images.unsplash.com/photo-1557804506-669a67965ba0?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=1267&amp;q=80");'>
                <span id="blackOverlay" class="w-full h-full absolute opacity-75 bg-black"></span>
            </div>


            <div class="mt-10 container relative mx-auto">
                <div class="items-center flex flex-wrap">
                    <div class="w-full lg:w-6/12 px-4 ml-auto mr-auto text-center">
                        <div class="pr-12">
                            <h1 class="text-white font-semibold text-5xl">
                                A Better project management workflow.
                            </h1>
                            <p class="mt-4 text-lg text-gray-300">
                                Lorem Ipsum
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>

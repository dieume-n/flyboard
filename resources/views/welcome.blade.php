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
    <div class="relative bg-white overflow-hidden">
        <div class="max-w-screen-xl mx-auto">
            <div class="relative z-10 pb-8 bg-white sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
                <svg class="hidden lg:block absolute right-0 inset-y-0 h-full w-48 text-white transform translate-x-1/2"
                    fill="currentColor" viewBox="0 0 100 100" preserveAspectRatio="none">
                    <polygon points="50,0 100,0 50,100 0,100" />
                </svg>

                <div class="relative pt-6 px-4 sm:px-6 lg:px-8">
                    <nav class="relative flex items-center justify-between sm:h-10">
                        <div class="flex items-center flex-grow flex-shrink-0 lg:flex-grow-0">
                            <div class="flex items-center justify-between w-full md:w-auto">
                                <a href="/" aria-label="Home">
                                    <h2 class="text-2xl font-semibold text-indigo-500">Flyboard</h2>
                                </a>
                                {{-- <div class="-mr-2 flex items-center md:hidden">
                                    <button type="button"
                                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out"
                                        id="main-menu" aria-label="Main menu" aria-haspopup="true">
                                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 6h16M4 12h16M4 18h16" />
                                        </svg>
                                    </button>
                                </div> --}}
                            </div>
                        </div>
                        <div class=" md:ml-10 md:pr-4">
                            <a href="/login"
                                class="ml-8 font-medium text-indigo-600 hover:text-indigo-900 transition duration-150 ease-in-out">
                                Login
                            </a>
                        </div>
                    </nav>
                </div>

                <main class="mt-14 mx-auto max-w-screen-xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-40 lg:px-8 xl:mt-28">
                    <div class="sm:text-center lg:text-left">
                        <h2
                            class="text-4xl tracking-tight leading-10 font-extrabold text-gray-900 sm:text-4xl sm:leading-none md:text-6xl">
                            A Better project management
                            <br class="xl:hidden">
                            <span class="text-indigo-600">Workflow</span>
                        </h2>
                        <p
                            class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                            Anim aute id magna aliqua ad ad non deserunt sunt. Qui irure qui lorem cupidatat commodo.
                            Elit sunt amet fugiat veniam occaecat fugiat aliqua.
                        </p>
                        <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                            <div class="rounded-md shadow">
                                <a href="/register"
                                    class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo transition duration-150 ease-in-out md:py-4 md:text-lg md:px-10">
                                    Get started
                                </a>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
            <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full"
                src="https://images.unsplash.com/photo-1551434678-e076c223a692?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2850&q=80"
                alt="">
        </div>
    </div>
    {{-- <nav class="top-0 absolute z-50 w-full">
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
    </main> --}}
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KH Flix</title>
    @vite('resources/css/app.css')
    <livewire:styles>
        <script src="https://kit.fontawesome.com/71df36b55d.js" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/alpinejs@3.x.x/dist/alpine.min.js" defer></script>
</head>

<body class="font-sans text-white bg-gray-900">
    <nav class="border-b border-gray-800">
        <div class="container flex flex-col items-center justify-between px-4 py-6 mx-auto md:flex-row">
            <ul class="flex flex-col items-center md:flex-row">
                <li>
                    <a href="{{ route('movies.index') }}">
                        <img src="{{ url('images/logo-color.png') }}" alt="" class="w-28 ">
                    </a>
                </li>
                <li class="mt-3 md:ml-16 md:mt-0">
                    <a href="{{ route('movies.index') }}" class="hover:text-gray-300">Movies</a>
                </li>
                <li class="mt-3 md:ml-6 md:mt-0">
                    <a href="{{ route('tv.index') }}" class="hover:text-gray-300">TV Shows</a>
                </li>
                <li class="mt-3 md:ml-6 md:mt-0">
                    <a href="{{ route('actors.index') }}" class="hover:text-gray-300">Actors</a>
                </li>
            </ul>
            <div class="flex flex-col items-center md:flex-row">
                @livewire('search-dropdown')
                <div class="mt-3 md:ml-4 md:mt-0">
                    <a href="#">
                        <i class="fa-solid fa-user"></i>
                    </a>
                </div>
            </div>
        </div>
    </nav>
    @yield('content')
    <livewire:scripts>
        @yield('scripts')
</body>

</html>

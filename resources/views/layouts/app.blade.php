<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        <script>
            const ul = document.getElementById('movies');
            const list = document.createDocumentFragment();
            const url = 'https://api.themoviedb.org/3/movie/popular?api_key=b228e0354b5ff112101aceeb5833e18d';
            const img_path = 'https://image.tmdb.org/t/p/original/'

            fetch(url)
                .then((response) => {
                    console.log(response);
                    return response.json();

                })
                .then((data) => {
                    console.log(data);
                    let movies = data;

                    data.results.map(function(movie) {

                        let li = document.createElement('li');
                        let image = document.createElement('img');
                        let title = document.createElement('h2');
                        

                        title.innerHTML = `${movie.title}`;
                        image.src = img_path + `${movie.poster_path}`;


                        li.appendChild(image);
                        li.appendChild(title);

                        ul.appendChild(li);
                    });
                })


            ul.appendChild(list);

        </script>
    </body>
</html>

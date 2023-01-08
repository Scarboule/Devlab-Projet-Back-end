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
                <div id="results" class="flex flex-wrap -mx-4"></div>
                {{ $slot }}
            </main>
        </div>
        <script>


            const API_KEY = 'b228e0354b5ff112101aceeb5833e18d';

            document.querySelector('#search-form').addEventListener('submit', (event) => {
                event.preventDefault();

                const movieName = document.querySelector('#movie-name').value;
                const onlyNonAdult = document.querySelector('#only-non-adult').checked;

                axios.get(`https://api.themoviedb.org/3/search/movie`, {
                    params: {
                        api_key: API_KEY,
                        query: movieName,
                        include_adult: !onlyNonAdult
                    }
                })
                    .then(response => {
                        let resultsHTML = '';

                        response.data.results.forEach(movie => {
                            if (onlyNonAdult && movie.adult) {
                                return;
                            }

                            resultsHTML += `
        <div class="mx-4 my-4 w-1/3">
          <img src="https://image.tmdb.org/t/p/w500/${movie.poster_path}" alt="${movie.title}" class="w-full h-auto rounded-lg shadow-lg">
          <h2 class="text-xl mt-4">${movie.title}</h2>
        </div>
      `;
                        });

                        document.querySelector('#results').innerHTML = resultsHTML;
                        if(resultsHTML == ''){
                            resultsHTML = '<p class="text-xl text-center mt-4">No results found</p>';
                            document.querySelector('#results').innerHTML = resultsHTML;
                        }
                    })
                    .catch(error => {
                        console.log(error);
                        document.querySelector('#results').innerHTML = '<p class="text-xl text-center mt-4">No results found</p>';
                    });
            });
        </script>
    </body>

</html>

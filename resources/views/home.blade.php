<x-app-layout>
    <h1>Discover Movies</h1>
    <form>
        <label for="sort">Sort by:</label>
        <select id="sort">
            <option value="popularity.asc">Popularity (Ascending)</option>
            <option value="popularity.desc">Popularity (Descending)</option>
            <option value="vote_average.asc">Rating (Ascending)</option>
            <option value="vote_average.asc">Rating (Descending)</option>
            <option value="original_title.asc">Name (Ascending)</option>
            <option value="original_title.desc">Name (Descending)</option>
        </select>
    </form>
    <div id="movies"></div>



    <script>

        const API_KEY = 'b228e0354b5ff112101aceeb5833e18d';

        let sort = 'popularity.desc';

        // Function to fetch and display movies
        function fetchMovies() {
            // Make API call to TMDb
            fetch(`https://api.themoviedb.org/3/discover/movie?sort_by=${sort}&api_key=${API_KEY}`)
                .then(response => response.json())
                .then(data => {
                    // Clear movies div
                    console.log(data);
                    document.getElementById('movies').innerHTML = '';

                    // Loop through results and display movie info
                    data.results.forEach(movie => {
                        let div = document.createElement('div');
                        div.innerHTML = `
            <a href="/singlemovie/${movie.id}">
              <h2>${movie.title}</h2>
              <img src="https://image.tmdb.org/t/p/w500/${movie.poster_path}" alt="${movie.title}" class="w-full h-auto rounded-lg shadow-lg">
            </a>
              <p>Popularity: ${movie.popularity}</p>
              <p>Rating: ${movie.vote_average}</p>
            `;
                        document.getElementById('movies').appendChild(div);
                    });
                });
        }
        document.getElementById('sort').addEventListener('change', function(e) {
            sort = e.target.value;
            fetchMovies();
        });
        // Fetch movies when page loads
        fetchMovies();

        // Update sort value and fetch movies when sort dropdown changes


    </script>

</x-app-layout>

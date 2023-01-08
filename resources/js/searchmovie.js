import axios from "axios";

const API_KEY = 'b228e0354b5ff112101aceeb5833e18d';

document.querySelector('#search-form').addEventListener('submit', (event) => {
    event.preventDefault();

    const movieName = document.querySelector('#movie-name').value;

    axios.get(`https://api.themoviedb.org/3/search/movie`, {
        params: {
            api_key: API_KEY,
            query: movieName
        }
    })
        .then(response => {
            let resultsHTML = '';

            response.data.results.forEach(movie => {
                resultsHTML += `
        <div class="mx-4 my-4 w-1/3">
          <img src="https://image.tmdb.org/t/p/w500/${movie.poster_path}" alt="${movie.title}" class="w-full h-auto rounded-lg shadow-lg">
          <h2 class="text-xl mt-4">${movie.title}</h2>
        </div>
      `;
            });

            document.querySelector('#results').innerHTML = resultsHTML;
        })
        .catch(error => {
            console.log(error);
            document.querySelector('#results').innerHTML = '<p class="text-xl text-center mt-4">No results found</p>';
        });
});

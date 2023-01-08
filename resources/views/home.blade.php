<x-app-layout>
    <h1>Welcome</h1>




    <ul class="flex-wrap" id="movies"></ul>


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

                    let link = document.createElement('a');
                    let li = document.createElement('li');
                    let image = document.createElement('img');
                    let title = document.createElement('h2');

                    link.href = 'singlemovie/'+ `${movie.id}`;
                    title.innerHTML = `${movie.title}`;
                    image.src = img_path + `${movie.poster_path}`;


                    li.appendChild(image);

                    li.appendChild(title);

                    ul.appendChild(link);
                    link.appendChild(li);
                });
            })


        ul.appendChild(list);


    </script>

</x-app-layout>

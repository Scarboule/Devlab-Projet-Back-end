<x-app-layout>
    <h1>Welcome</h1>




    <ul class="flex-wrap" id="movies"></ul>



    <script>
        const ul = document.getElementById('movies');
        const list = document.createDocumentFragment();
        const singleGenreUrl = 'https://api.themoviedb.org/3/discover/movie?api_key=b228e0354b5ff112101aceeb5833e18d&with_genres=';
        let url = singleGenreUrl + {{ $id }};
        const img_path = 'https://image.tmdb.org/t/p/original/'
        console.log(url);

        fetch(url)
            .then((response) => {
                console.log(response);
                return response.json();

            })
            .then((data) => {
                console.log(data);

                data.results.map(function(movie) {
                    let link = document.createElement('a');
                    let li = document.createElement('li');
                    let image = document.createElement('img');
                    let title = document.createElement('h2');

                    link.href = '../singlemovie/'+ `${movie.id}`;
                    title.innerHTML = `${movie.title}`;
                    image.src = img_path + `${movie.poster_path}`;


                    li.appendChild(image);

                    li.appendChild(title);

                    ul.appendChild(link);
                    link.appendChild(li);
                });
            })


        ul.appendChild(list);




                /*data.results.map(function(movie) {
                    let movieGenre = movie.genre_ids;
                    console.log(movieGenre.length);
                    for (var i = 0; i < movieGenre.length; i++) {

                        if(movieGenre[i] == IDDDD){
                            let li = document.createElement('li');
                            let image = document.createElement('img');
                            let title = document.createElement('h2');


                            title.innerHTML = `${movie.title}`;
                            image.src = img_path + `${movie.poster_path}`;


                            li.appendChild(image);

                            li.appendChild(title);

                            ul.appendChild(li);
                        }
                    }





                });
            })


        ul.appendChild(list);*/


    </script>

</x-app-layout>

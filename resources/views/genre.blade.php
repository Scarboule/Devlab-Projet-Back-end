<x-app-layout>
    <h1>Welcome</h1>




    <ul  id="genres"></ul>

    <script>
        const ul = document.getElementById('genres');
        const list = document.createDocumentFragment();
        const url = 'https://api.themoviedb.org/3/genre/movie/list?api_key=b228e0354b5ff112101aceeb5833e18d';
        const base_genre_url = 'https://api.themoviedb.org/3/discover/movie?api_key=b228e0354b5ff112101aceeb5833e18d&sort_by=popularity.desc&page=1&with_genres='

        fetch(url/*, {
        headers : {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        }
    }*/)
            .then((response) => {
                console.log(response);
                return response.json();

            })
            .then((data) => {
                console.log(data);
                let genres = data;

                genres.genres.map(function(genre) {

                    let li = document.createElement('li');
                    //let image = document.createElement('img');
                    let name = document.createElement('a');

                    name.innerHTML = `${genre.name}`;
                    name.id = `${genre.name}`;
                    name.class = 'genre';
                    name.onclick

                    //image.src = `${cour.image_url}`;

                    //li.appendChild(image);
                    li.appendChild(name);
                    ul.appendChild(li);
                });
            })
        const hhh = document.getElementsByClassName('genre');
        hhh.onclick = function (){
            let bbb = hhh.id;
            let genre_url = base_genre_url + bbb
            fetch(genre_url)
                .then((response) => {
                    console.log(response);
                    return response.json();

                })
                .then((data) => {
                    console.log(data);
                    let movies = data;
                    movies.results.map(function(movie) {

                        let li = document.createElement('li');
                        let image = document.createElement('img');
                        let title = document.createElement('h2');

                        title.innerHTML = `${movie.title}`;
                        image.src = image_base_url + image_size_url[1] + `${movie.poster_path}`;

                        li.appendChild(image);
                        li.appendChild(title);
                        ul.appendChild(li);
                    });
                })
            ul.appendChild(list);
        }



        ul.appendChild(list);

    </script>


</x-app-layout>

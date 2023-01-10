<x-app-layout>
    <h1>Yoyo</h1>
    <div class="flex-wrap" id="singlemovie"></div>



    <script>
        const ul = document.getElementById('singlemovie');
        const list = document.createDocumentFragment();
        let url = 'https://api.themoviedb.org/3/movie/{{ $id }}?api_key=b228e0354b5ff112101aceeb5833e18d';
        const img_path = 'https://image.tmdb.org/t/p/original/'
        console.log(url);

        fetch(url)
            .then((response) => {
                console.log(response);
                return response.json();

            })
            .then((data) => {
                console.log(data);


                    let li = document.createElement('li');
                    let image = document.createElement('img');
                    let title = document.createElement('h2');


                    title.innerHTML = `${data.title}`;
                    image.src = img_path + `${data.poster_path}`;

                    li.appendChild(title);
                    li.appendChild(image);



                    ul.appendChild(li);

            })



    </script>

</x-app-layout>

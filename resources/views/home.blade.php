<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="text-gray-600 font-body">

    <div class="grid md:grid-cols-5">
        <div class="md:col-span-1 md:flex md:justify-end">
            <nav class="text-right">
                <div class="flex justify-between items-center">
                    <h1 class="font-bold p-4 border-b border-gray-100">
                        <a href="/" class="hover:text-gray-700">Badi Food</a>
                    </h1>
                    <div class="px-4 cursor-pointer md:hidden" id="menu-button">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </div>
                </div>
                <ul class="text-sm mt-6 hidden md:block" id="menu">
                    <li class="text-gray-700 font-bold py-1 border-r-4 border-primary">
                        <a href="{{ route('Home') }}" class="px-4">
                            <span>Home</span>
                            <svg class="w-5 inline-block ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg>
                        </a>
                    </li>
                    <li class="py-1 border-r-4 border-white">
                        <a href="#" class="px-4">
                            <span>About</span>
                            <svg class="w-5 inline-block ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                </path>
                            </svg>
                        </a>
                    </li>
                    <li class="py-1border-r-4 border-white">
                        <a href="#" class="px-4">
                            <span>Contact</span>
                            <svg class="w-5 inline-block ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <main class="px-16 py-6 bg-gray-100 md:col-span-4">
            <div class="flex justify-center md:justify-end">
                <a href="#"
                    class="btn text-primary border-primary md:border-2 hover:bg-primary hover:text-white transition ease-out duration-500">Log
                    in</a>
                <a href="#"
                    class="btn text-primary ml-2 border-primary md:border-2 hover:bg-primary hover:text-white transition ease-out duration-500">Sign
                    up</a>
            </div>

            <header>
                <h2 class="text-gray-700 text-6xl font-semibold">Recipes</h2>
                <h3 class="text-2xl font-semibold">For Everyone</h3>
            </header>

            <div>
                <h4 class="font-bold mt-12 pb-2 border-b border-gray-200">Latest Recipes</h4>

                <div id="cards" class="mt-8 grid lg:grid-cols-3 gap-10">
                    <!-- cards go here -->
                    @foreach ($recipes as $recipe)
                        <div class="card modal-open cursor-pointer" onclick="toggleModal({{ $recipe }})">
                            <img class="w-full h-32 sm:h-48 object-cover" src="{{ Storage::url($recipe->image) }}">
                            <div class="m-4">
                                <span class="font-bold">{{ $recipe->title }}</span>
                                <span class="block text-gray-500 text-sm">Recipe by {{ $recipe->author }}</span>
                            </div>
                            <div class="badge">
                                <svg class="w-5 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span>{{ $recipe->duration }} mins</span>
                            </div>
                        </div>
                    @endforeach
                </div>


                {{-- <h4 class="font-bold mt-12 pb-2 border-b border-gray-200">Most Popular</h4>

                <div class="mt-8">
                    <!-- cards go here -->
                </div> --}}
            </div>

            <div class="flex justify-center mt-12">
                <div id="load-more" offset="3"
                    class=" btn bg-secondary-100 text-secondary-200 hover:shadow-inner transform hover:scale-125 hover:bg-opacity-50 transition ease-out duration-300">
                    Load more</div>
            </div>
        </main>
    </div>
    <div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
        <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

        <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">

            <div
                class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
                <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                    viewBox="0 0 18 18">
                    <path
                        d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                    </path>
                </svg>
                <span class="text-sm">(Esc)</span>
            </div>

            <!-- Add margin if you want to see some of the overlay behind the modal-->
            <div class="modal-content py-4 text-left px-6">
                <!--Title-->
                <div class="flex justify-between items-center pb-3 border-b border-gray-300">
                    <p class="text-2xl font-bold" id="modal-header"></p>
                    <div class="modal-close cursor-pointer z-50">
                        <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                            viewBox="0 0 18 18">
                            <path
                                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                            </path>
                        </svg>
                    </div>
                </div>

                <!--Body-->
                <p id="modal-body" class="mt-5"></p>


                <!--Footer-->
                <div class="flex justify-end pt-2">
                    <button
                        class="modal-close px-4 bg-primary p-3 rounded-lg text-white hover:shadow-lg">Close</button>
                </div>

            </div>
        </div>
    </div>

</body>

</html>
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
crossorigin="anonymous"></script>
<script>
    $('#load-more').click(function() {
        let offset = parseInt($('#load-more').attr('offset'));
        var url = "{{ route('recipes', [':offset', ':limit']) }}";
        url = url.replace(':offset', offset);
        url = url.replace(':limit', 3);
        axios.post(url).then((response) => {
            console.log(response.data);
            let data = response.data;
            if (data.length > 0) {
                addCards(data)
                offset += 3;
                $('#load-more').attr('offset', offset);
                if (data.length < 3) $('#load-more').addClass('hidden');
            }
        });

    });

    const addCards = (recipes) => {
        for (let recipe of recipes) {
            let card = $('<div></div>');
            card.addClass('card');
            let img = $('<img>');
            img.attr('src', "/storage/" + recipe.image);
            img.addClass('w-full h-32 sm:h-48 object-cover');
            let titleDiv = $('<div></div>');
            titleDiv.addClass('m-4');
            let titleSpan = $('<span></span>');
            titleSpan.addClass('font-bold');
            titleSpan.text(recipe.title);
            let authorSpan = $('<span></span>');
            authorSpan.addClass('block text-gray-500 text-sm');
            authorSpan.text('Recipe by ' + recipe.author);
            let badgeDiv = $('<div></div>');
            badgeDiv.addClass('badge');
            let badgeSpan = $('<span></span>');
            badgeSpan.text(recipe.duration + " MINS");

            badgeDiv.append(badgeSpan);
            titleDiv.append(titleSpan);
            titleDiv.append(authorSpan);
            card.append(img);
            card.append(titleDiv);
            card.append(badgeDiv);
            card.click(function (e) { 
                e.preventDefault();
                toggleModal(recipe);
            });
            $('#cards').append(card);
        }
    }

    /* var openmodal = document.querySelectorAll('.modal-open')
    for (var i = 0; i < openmodal.length; i++) {
        openmodal[i].addEventListener('click', function(event) {
            event.preventDefault()
            toggleModal()
        })
    } */

    const overlay = document.querySelector('.modal-overlay')
    overlay.addEventListener('click', toggleModal)

    var closemodal = document.querySelectorAll('.modal-close')
    for (var i = 0; i < closemodal.length; i++) {
        closemodal[i].addEventListener('click', toggleModal)
    }

    document.onkeydown = function(evt) {
        evt = evt || window.event
        var isEscape = false
        if ("key" in evt) {
            isEscape = (evt.key === "Escape" || evt.key === "Esc")
        } else {
            isEscape = (evt.keyCode === 27)
        }
        if (isEscape && document.body.classList.contains('modal-active')) {
            toggleModal()
        }
    };


    function toggleModal(recipe) {
        console.log(recipe);
        const body = document.querySelector('body')
        const modal = document.querySelector('.modal')
        const modal_header = document.querySelector('#modal-header');
        const modal_body = document.querySelector('#modal-body');
        modal_header.innerText = recipe.title + ' - ' + recipe.author;
        modal_body.innerText = recipe.instructions;
        modal.classList.toggle('opacity-0')
        modal.classList.toggle('pointer-events-none')
        body.classList.toggle('modal-active')
    }
</script>

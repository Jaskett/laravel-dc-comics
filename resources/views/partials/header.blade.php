<header class="py-3">
    <div class="container text-center">
        <a href="{{ route('home') }}">
            <img src="{{ Vite::asset('resources/images/dc-logo.png') }}" alt="Logo">
        </a>
    </div>
    <div class="container">
        <a class="btn btn-success" href="{{ route('comics.create') }}">Add a new comic</a>
    </div>
</header>
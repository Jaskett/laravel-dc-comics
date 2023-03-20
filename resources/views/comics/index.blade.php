@extends('layouts.main')

@section('content')
    <div class="container">
        <h1>Comics list</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Series</th>
                    <th scope="col">Type</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($comics as $comic)
                    <tr>
                        <td>{{ $comic->id }}</td>
                        <td>{{ $comic->title }}</td>
                        <td>{{ $comic->series }}</td>
                        <td>{{ $comic->type }}</td>
                        <td><a class="btn btn-primary" href="{{ route('comics.show', $comic) }}" title="show">Modify</a></td>
                    </tr>
                @empty
                    <h1>No product found</h1>
                @endforelse
            </tbody>
        </table>

        {{ $comics->links() }}
    </div>
@endsection
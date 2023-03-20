@extends('layouts.main')

@section('content')
    <div class="container">
        <h1>Comics list</h1>

        @if (session('deleted'))
            <div>
                <div class="alert alert-success" role="alert">
                    {{ session('deleted') }}
                </div>
            </div>
        @endif

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
                        <td>
                            <a href="{{ route('comics.show', $comic) }}" class="btn btn-info">
                                <i class="fa-regular fa-eye"></i>
                            </a>
                            <a href="{{ route('comics.edit', $comic) }}" class="btn btn-warning mx-2">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            @include('partials.form-delete', ['comic' => $comic])
                        </td>
                    </tr>
                @empty
                    <h1>No product found</h1>
                @endforelse
            </tbody>
        </table>

        {{ $comics->links() }}
    </div>
@endsection
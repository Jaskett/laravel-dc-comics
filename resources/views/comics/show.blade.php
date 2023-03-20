@extends('layouts.main')

@section('content')
    <div class="container">
        <h1>{{ $comic->title }}</h1>
        <div>Series: <strong>{{ $comic->series }}</strong></div>
        <div>Type: <strong>{{ $comic->type }}</strong></div>
        <div>Release date: <strong>{{ $comic->sale_date }}</strong></div>
        <div>Price: <strong>${{ $comic->price }}</strong></div>
        <div class="text-center my-4">
            <img src="{{ $comic->thumb }}" alt="{{ $comic->title }}">
        </div>
        <p>{!! $comic->description !!}</p>

        <a class="btn btn-primary" href="{{ route('comics.index') }}">Go back to list</a>
    </div>
@endsection
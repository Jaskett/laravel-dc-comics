@extends('layouts.main')

@section('content')
    <div class="container">
        <h1>Edit {{ $comic->title }}</h1>
        
        @include('partials.form-delete', ['comic' => $comic])

        <form action="{{ route('comics.update', $comic) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ $comic->title }}" placeholder="Add title">
            </div>
            
            <div class="mb-3">
                <label for="thumb" class="form-label">Image</label>
                <input type="text" class="form-control" name="thumb" id="thumb" value="{{ $comic->thumb }}"placeholder="Add image URL">
            </div>

            <div class="mb-3">
                <label for="series" class="form-label">Series</label>
                <input type="text" class="form-control" name="series" id="series" value="{{ $comic->series }}"placeholder="Add series">
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Type</label>
                <input type="text" class="form-control" name="type" id="type" value="{{ $comic->type }}"placeholder="Add type">
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control" name="price" id="price" value="{{ $comic->price }}"placeholder="Add price">
            </div>

            <div class="mb-3">
                <label for="sale_date" class="form-label">Release date</label>
                <input type="text" class="form-control" name="sale_date" id="sale_date" value="{{ $comic->sale_date }}" placeholder="Add date">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="description" value="{{ $comic->description }}" rows="3"></textarea>
            </div>
            
            <button type="submit" class="btn btn-primary mb-5">Confirm</button>
        </form>
    </div>
@endsection
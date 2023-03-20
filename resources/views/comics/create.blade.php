@extends('layouts.main')

@section('content')
    <div class="container">
        <h1>Add a new comic</h1>

        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('comics.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Title*</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" placeholder="Add title">
            </div>

            <div class="mb-3">
                <label for="thumb" class="form-label">Image*</label>
                <input type="text" class="form-control" name="thumb" id="thumb" value="{{ old('thumb') }}" placeholder="Add image URL">
            </div>

            <div class="mb-3">
                <label for="series" class="form-label">Series</label>
                <input type="text" class="form-control" name="series" id="series" value="{{ old('series') }}" placeholder="Add series">
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Type</label>
                <input type="text" class="form-control" name="type" id="type" value="{{ old('type') }}" placeholder="Add type">
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price*</label>
                <input type="text" class="form-control" name="price" id="price" value="{{ old('price') }}" placeholder="Add price">
            </div>

            <div class="mb-3">
                <label for="sale_date" class="form-label">Release date*</label>
                <input type="text" class="form-control" name="sale_date" id="sale_date" value="{{ old('sale_date') }}" placeholder="Add date">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="description" value="{{ old('description') }}" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-primary mb-5">Add</button>
        </form>
    </div>
@endsection
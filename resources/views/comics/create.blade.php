@extends('layouts.main')

@section('content')
    <div class="container">
        <h1>Add a new comic</h1>

        <form action="{{ route('comics.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Add title">
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="text" class="form-control" name="image" id="image" placeholder="Add image URL">
            </div>

            <div class="mb-3">
                <label for="series" class="form-label">Series</label>
                <input type="text" class="form-control" name="series" id="series" placeholder="Add series">
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Type</label>
                <input type="text" class="form-control" name="type" id="type" placeholder="Add type">
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control" name="price" id="price" placeholder="Add price">
            </div>

            <div class="mb-3">
                <label for="sale-date" class="form-label">Release date</label>
                <input type="text" class="form-control" name="sale_date" id="sale_date" placeholder="Add date">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="description" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-primary mb-5">Add</button>
        </form>
    </div>
@endsection
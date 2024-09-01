@extends('layouts.app')

@section('title', 'Add Movie')

@section('content')
    <h1>Add New Movie</h1>
    <form action="{{ route('movies.store') }}" method="POST">
        @csrf
        <div>
            <label for="title">Title</label>
            <input type="text" id="title" name="title">
        </div>
        <div>
            <label for="description">description</label>
            <input type="text" id="description" name="description">
        </div>
        <div>
            <label for="year">Release Year</label>
            <input type="number" id="year" name="year">
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection

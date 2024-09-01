@extends('layouts.app')

@section('title', 'Edit Movie')

@section('content')
    <h1>Edit Movie</h1>
    <form action="{{ route('movies.update', $movie->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="title">Title</label>
            <input type="text" id="title" name="title" value="{{ $movie->title }}">
        </div>
        <div>
            <label for="description">description</label>
            <input type="text" id="description" name="description" value="{{ $movie->description }}">
        </div>
        <div>
            <label for="year">Release Year</label>
            <input type="number" id="year" name="year" value="{{ $movie->year }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection

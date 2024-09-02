@extends('layouts.app')

@section('title', 'View Movie')

@section('content')
    <h1>{{ $movie->title }}</h1>
    <p>Release Year: {{ $movie->year }}</p>
    <p>{{ $movie->description }}</p>
    <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-primary">Edit</a>
    <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
    <a href="{{ route('movies.index') }}" class="btn btn-secondary">Back to Movies</a>
@endsection

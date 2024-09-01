@extends('layouts.app')

@section('title', 'Movies')

@section('content')
    <h1>Movies</h1>
    <a href="{{ route('movies.create') }}" class="btn btn-primary">Add New Movie</a>
    <ul>
        @foreach ($movies as $movie)
            <li>
                <a href="{{ route('movies.show', $movie->id) }}">{{ $movie->title }}</a>
                <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection

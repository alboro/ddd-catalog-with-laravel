@extends('layouts.app')

@section('title', 'Movies')

@section('content')
    <h1>Movies</h1>
    <ul>
        @foreach ($movies as $movie)
            <li>
                <a href="{{ route('movies.show', $movie->id) }}">{{ $movie->title }}</a>
                <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" style="display:inline;">
                    <a href="{{ route('movies.edit', $movie->id) }}">Edit
                    </a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection

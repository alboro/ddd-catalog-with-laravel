<?php

namespace App\Presentation;

use App\Application\Cqrs\Commands\CreateMovieCommand;
use App\Application\Cqrs\Commands\DeleteMovieCommand;
use App\Application\Cqrs\Commands\UpdateMovieCommand;
use App\Application\Cqrs\Handlers\Contracts\CreateMovieHandlerInterface;
use App\Application\Cqrs\Handlers\Contracts\DeleteMovieHandlerInterface;
use App\Application\Cqrs\Handlers\Contracts\ListMoviesHandlerInterface;
use App\Application\Cqrs\Handlers\Contracts\ReadMovieHandlerInterface;
use App\Application\Cqrs\Handlers\Contracts\UpdateMovieHandlerInterface;
use App\Application\Cqrs\Query\ListMoviesQuery;
use App\Application\Cqrs\Query\ReadMovieQuery;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

/**
 * GET /movies-vue - Displays a list of all movies (index method).
 * GET /movies-vue/create - Displays a form for creating a new movie (create method).
 * POST /movies-vue - Handles creating a new movie (store method).
 * GET /movies-vue/{movie} - Displays a specific movie (show method).
 * GET /movies-vue/{movie}/edit - Displays a form for editing a movie (edit method).
 * PUT/PATCH /movies-vue/{movie} - Handles updating a movie (update method).
 * DELETE /movies-vue/{movie} - Handles deleting a movie (destroy method).
 */
class MovieVueController extends Controller
{
    public function __construct(
        private readonly ListMoviesHandlerInterface $listMoviesHandler,
        private readonly CreateMovieHandlerInterface $createMovieHandler,
        private readonly ReadMovieHandlerInterface $readMovieHandler,
        private readonly UpdateMovieHandlerInterface $updateMovieHandler,
        private readonly DeleteMovieHandlerInterface $deleteMovieHandler,
    ) {
    }

    public function index(Request $request)
    {
        if (!$request->isXmlHttpRequest()) {
            return view('welcome');
        }
        $movies = $this->listMoviesHandler->handle(new ListMoviesQuery());

        return response()->json($movies);
    }

    public function create()
    {
        return view('welcome');
    }

    /**
     * Display the specified movie.
     */
    public function show(Request $request, $id)
    {
        if (!$request->isXmlHttpRequest()) {
            return view('welcome');
        }
        $command = new ReadMovieQuery(Uuid::fromString($id));

        return response()->json($this->readMovieHandler->handle($command));
    }

    public function edit($id)
    {
        $command = new ReadMovieQuery(Uuid::fromString($id));

        return response()->json($this->readMovieHandler->handle($command));
    }

    public function store(Request $request)
    {
        $command = new CreateMovieCommand(
            Uuid::uuid7(),
            $request->input('title'),
            $request->input('description'),
            $request->input('year')
        );
        $this->createMovieHandler->handle($command);

        return response()->json(['message' => 'Movie created successfully.']);
    }

    /**
     * Update the specified movie in storage.
     */
    public function update(Request $request, $id)
    {
        $command = new UpdateMovieCommand(
            Uuid::fromString($id),
            $request->get('title'),
            $request->get('description'),
            $request->get('year')
        );

        $this->updateMovieHandler->handle($command);

        return response()->json(['message' => 'Movie updated successfully.']);
    }

    /**
     * Remove the specified movie from storage.
     */
    public function destroy($id)
    {
        $command = new DeleteMovieCommand(Uuid::fromString($id));
        $this->deleteMovieHandler->handle($command);

        return response()->json(['message' => 'Movie deleted successfully.']);
    }
}

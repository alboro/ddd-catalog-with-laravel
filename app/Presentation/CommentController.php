<?php

namespace App\Presentation;

use App\Application\Cqrs\Commands\CreateCommentCommand;
use App\Application\Cqrs\Handlers\Contracts\CreateCommentHandlerInterface;
use App\Application\Cqrs\Handlers\Contracts\ListCommentsHandlerInterface;
use App\Application\Cqrs\Query\ListCommentsQuery;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

class CommentController extends Controller
{
    public function __construct(
        private readonly CreateCommentHandlerInterface $createCommentHandler,
        private readonly ListCommentsHandlerInterface $listCommentsHandler,
    ) {}

    public function index(Request $request, string $movieId)
    {
        if (!$request->isXmlHttpRequest()) {
            return view('welcome');
        }

        $query = new ListCommentsQuery(Uuid::fromString($movieId));
        $comments = $this->listCommentsHandler->handle($query);

        return response()->json($comments);
    }

    public function store(Request $request, $movieId)
    {
        $command = new CreateCommentCommand(
            Uuid::uuid7(),
            Uuid::fromString($movieId),
            $request->input('content')
        );

        $this->createCommentHandler->handle($command);

        return response()->json(['message' => 'Comment added successfully.']);
    }
}

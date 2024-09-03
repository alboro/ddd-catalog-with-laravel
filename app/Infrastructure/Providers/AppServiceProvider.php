<?php

namespace App\Infrastructure\Providers;

use App\Application\Assemblers\CommentAssembler;
use App\Application\Assemblers\CommentAssemblerInterface;
use App\Application\Assemblers\MovieAssembler;
use App\Application\Assemblers\MovieAssemblerInterface;
use App\Application\Cqrs\Handlers\Contracts\CreateCommentHandlerInterface;
use App\Application\Cqrs\Handlers\Contracts\CreateLikeHandlerInterface;
use App\Application\Cqrs\Handlers\Contracts\CreateMovieHandlerInterface;
use App\Application\Cqrs\Handlers\Contracts\DeleteMovieHandlerInterface;
use App\Application\Cqrs\Handlers\Contracts\ListCommentsHandlerInterface;
use App\Application\Cqrs\Handlers\Contracts\ListMoviesHandlerInterface;
use App\Application\Cqrs\Handlers\Contracts\ReadMovieHandlerInterface;
use App\Application\Cqrs\Handlers\Contracts\UpdateMovieHandlerInterface;
use App\Application\Cqrs\Handlers\CreateCommentHandler;
use App\Application\Cqrs\Handlers\CreateLikeHandler;
use App\Application\Cqrs\Handlers\CreateMovieHandler;
use App\Application\Cqrs\Handlers\DeleteMovieHandler;
use App\Application\Cqrs\Handlers\ListCommentsHandler;
use App\Application\Cqrs\Handlers\ListMoviesHandler;
use App\Application\Cqrs\Handlers\ReadMovieHandler;
use App\Application\Cqrs\Handlers\UpdateMovieHandler;
use App\Application\Dao\LikeDaoInterface;
use App\Application\Services\CommentHydrator;
use App\Application\Services\CommentHydratorInterface;
use App\Application\Services\MovieHydrator;
use App\Application\Services\MovieHydratorInterface;
use App\Application\Transformers\CommentToColumnsTransformer;
use App\Application\Transformers\CommentToColumnsTransformerInterface;
use App\Application\Transformers\MovieToColumnsTransformer;
use App\Application\Transformers\MovieToColumnsTransformerInterface;
use App\Domain\Repositories\CommentRepositoryInterface;
use App\Domain\Repositories\LikeRepositoryInterface;
use App\Domain\Repositories\MovieRepositoryInterface;
use App\Infrastructure\Persistence\Dao\LikeDao;
use App\Infrastructure\Persistence\Repositories\EloquentCommentRepository;
use App\Infrastructure\Persistence\Repositories\EloquentLikeRepository;
use App\Infrastructure\Persistence\Repositories\EloquentMovieRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        // Repositories
        $this->app->bind(MovieRepositoryInterface::class, EloquentMovieRepository::class);
        $this->app->bind(LikeRepositoryInterface::class, EloquentLikeRepository::class);
        $this->app->bind(CommentRepositoryInterface::class, EloquentCommentRepository::class);

        // Handlers
        $this->app->bind(ListMoviesHandlerInterface::class, ListMoviesHandler::class);
        $this->app->bind(CreateMovieHandlerInterface::class, CreateMovieHandler::class);
        $this->app->bind(ReadMovieHandlerInterface::class, ReadMovieHandler::class);
        $this->app->bind(UpdateMovieHandlerInterface::class, UpdateMovieHandler::class);
        $this->app->bind(DeleteMovieHandlerInterface::class, DeleteMovieHandler::class);

        $this->app->bind(CreateCommentHandlerInterface::class, CreateCommentHandler::class);
        $this->app->bind(CreateLikeHandlerInterface::class, CreateLikeHandler::class);
        $this->app->bind(ListCommentsHandlerInterface::class, ListCommentsHandler::class);

        // Other
        $this->app->bind(LikeDaoInterface::class, LikeDao::class);
        $this->app->bind(MovieAssemblerInterface::class, MovieAssembler::class);
        $this->app->bind(CommentAssemblerInterface::class, CommentAssembler::class);
        $this->app->bind(MovieHydratorInterface::class, MovieHydrator::class);
        $this->app->bind(CommentHydratorInterface::class, CommentHydrator::class);
        $this->app->bind(MovieToColumnsTransformerInterface::class, MovieToColumnsTransformer::class);
        $this->app->bind(CommentToColumnsTransformerInterface::class, CommentToColumnsTransformer::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

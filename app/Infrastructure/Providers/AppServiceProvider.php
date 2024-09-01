<?php

namespace App\Infrastructure\Providers;

use App\Application\Assemblers\MovieAssembler;
use App\Application\Assemblers\MovieAssemblerInterface;
use App\Application\Cqrs\Handlers\Contracts\CreateMovieHandlerInterface;
use App\Application\Cqrs\Handlers\Contracts\DeleteMovieHandlerInterface;
use App\Application\Cqrs\Handlers\Contracts\ListMoviesHandlerInterface;
use App\Application\Cqrs\Handlers\Contracts\ReadMovieHandlerInterface;
use App\Application\Cqrs\Handlers\Contracts\UpdateMovieHandlerInterface;
use App\Application\Cqrs\Handlers\CreateMovieHandler;
use App\Application\Cqrs\Handlers\DeleteMovieHandler;
use App\Application\Cqrs\Handlers\ListMoviesHandler;
use App\Application\Cqrs\Handlers\ReadMovieHandler;
use App\Application\Cqrs\Handlers\UpdateMovieHandler;
use App\Application\Services\MovieHydrator;
use App\Application\Services\MovieHydratorInterface;
use App\Application\Transformers\MovieToColumnsTransformer;
use App\Application\Transformers\MovieToColumnsTransformerInterface;
use App\Domain\Repositories\MovieRepositoryInterface;
use App\Infrastructure\Persistence\Repositories\EloquentMovieRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        // Domain
        $this->app->bind(MovieRepositoryInterface::class, EloquentMovieRepository::class);

        // Application: handlers
        $this->app->bind(ListMoviesHandlerInterface::class, ListMoviesHandler::class);
        $this->app->bind(CreateMovieHandlerInterface::class, CreateMovieHandler::class);
        $this->app->bind(ReadMovieHandlerInterface::class, ReadMovieHandler::class);
        $this->app->bind(UpdateMovieHandlerInterface::class, UpdateMovieHandler::class);
        $this->app->bind(DeleteMovieHandlerInterface::class, DeleteMovieHandler::class);

        // Application: misc
        $this->app->bind(MovieAssemblerInterface::class, MovieAssembler::class);
        $this->app->bind(MovieHydratorInterface::class, MovieHydrator::class);
        $this->app->bind(MovieToColumnsTransformerInterface::class, MovieToColumnsTransformer::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

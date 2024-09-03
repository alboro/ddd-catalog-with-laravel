<?php

namespace App\Application\Cqrs\Handlers;

use App\Application\Assemblers\MovieAssemblerInterface;
use App\Application\Cqrs\Handlers\Contracts\ReadMovieHandlerInterface;
use App\Application\Cqrs\Query\ReadMovieQuery;
use App\Application\Dao\LikeDaoInterface;
use App\Application\Dto\MovieDto;
use App\Domain\Repositories\MovieRepositoryInterface;

final readonly class ReadMovieHandler implements ReadMovieHandlerInterface
{
    public function __construct(
        private MovieRepositoryInterface $repository,
        private MovieAssemblerInterface $movieAssembler,
        private LikeDaoInterface $likeDao,
    ) {
    }

    public function handle(ReadMovieQuery $query): MovieDto
    {
        $movie = $this->repository->findById($query->movieId);
        $likeCount = $this->likeDao->countLikesByMovieId($query->movieId);

        return $this->movieAssembler->createDto($movie, $likeCount);
    }
}

<?php

namespace App\Service;

use App\Entity\Position;
use App\Repository\PositionRepository;

readonly class PositionService
{

    public function __construct(
        private PositionRepository $repository
    ){}

    public function list(int $id, ?int $positionSize, ?int $positionPage): array
    {
        $positions = $this->repository->findBy(
            criteria: ['person' => $id],
            orderBy: ['startAt' => 'desc'],
            limit: $positionSize,
            offset: ($positionPage - 1) * $positionSize
        );

        return array_map(static function (Position $position) {
            return [
                'title' => $position->getTitle(),
                'description' => $position->getDescription(),
                'startAt' => $position->getStartAt()?->format('m/Y'),
                'endAt' => $position->getEndAt()?->format('m/Y'),
                'stack' => $position->getStack(),
                'company' => $position->getCompany()?->getName(),
            ];
        }, $positions);
    }

}
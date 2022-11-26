<?php

namespace App\Infrastructure\Doctrine\Repositories;

use Cmd\Repositories\TeamRepository;

class DoctrineTeamRepository extends DoctrineReadRepository implements TeamRepository
{
    public function getEntity(): string
    {
        return self::ENTITY;
    }
}
<?php

namespace Cmd\Repositories;

use Cmd\Entities\Team;

interface TeamRepository extends ReadRepository
{
    public const ENTITY = Team::class;
}

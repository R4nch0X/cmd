<?php

namespace Cmd\Services;

use Cmd\Entities\Team;
use Cmd\Payloads\TeamCreatePayload;
use Cmd\Payloads\TeamUpdatePayload;
use Cmd\Repositories\PersistRepository;

class Teams
{
    private PersistRepository $persistRepository;

    public function __construct(PersistRepository $persistRepository)
    {
        $this->persistRepository = $persistRepository;
    }

    public function create(TeamCreatePayload $teamCreatePayload): Team
    {
        $team = new Team($teamCreatePayload);

        if ($teamCreatePayload->description()) {
            $team->setDescription($teamCreatePayload->description());
        }

        if ($teamCreatePayload->active()) {
            $team->setActive($teamCreatePayload->active());
        }

        if ($teamCreatePayload->flag()) {
            $team->setFlag($teamCreatePayload->flag());
        }

        if ($teamCreatePayload->colors()) {
            $team->setColor($teamCreatePayload->colors());
        }

        $this->persistRepository->save($team);

        return $team;
    }

    public function update(Team $team, TeamUpdatePayload $teamUpdatePayload): void
    {
        $team->update($teamUpdatePayload);
        $this->persistRepository->save($team);
    }
}

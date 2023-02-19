<?php

namespace Cmd\Entities;

use Cmd\Payloads\TeamCreatePayload;
use Cmd\Payloads\TeamUpdatePayload;
use LaravelDoctrine\Extensions\SoftDeletes\SoftDeletes;
use LaravelDoctrine\Extensions\Timestamps\Timestamps;

/**
 * @see TeamMapping
 */
class Team
{
    use Timestamps;
    use SoftDeletes;

    private ?int $id;

    private string $name;

    private ?string $description;

    private bool $active = false;

    private ?string $flag;

    private ?string $colors;

    public function __construct(TeamCreatePayload $teamCreatePayload)
    {
        $this->name = $teamCreatePayload->name();
    }

    public function update(TeamUpdatePayload $payload)
    {
        $this->name = $payload->name();
        $this->description = $payload->description();
        $this->active = $payload->active();
        $this->flag = $payload->flag();
        $this->colors = $payload->color();
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function setActive(?bool $active): void
    {
        $this->active = $active;
    }

    public function setFlag(?string $flag): void
    {
        $this->flag = $flag;
    }

    public function setColor(?string $color): void
    {
        $this->colors = $color;
    }
}

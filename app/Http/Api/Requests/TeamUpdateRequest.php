<?php

namespace App\Http\Api\Requests;

use Cmd\Entities\Team;
use Cmd\Payloads\TeamUpdatePayload;

class TeamUpdateRequest extends Request implements TeamUpdatePayload
{
    public const NAME = 'name';

    public const DESCRIPTION = 'description';

    public const ID = 'id';

    public const ACTIVE = 'active';

    public const FLAG = 'flag';

    public const COLOR = 'color';

    public function validation(): array
    {
        return $this->validate([
            self::NAME => 'required|max:255|unique:'.Team::class.','.self::NAME.','.$this->id(),
            self::DESCRIPTION => 'required|string',
            self::ACTIVE => 'required|bool',
            self::FLAG => 'required|string',
            self::COLOR => 'required|string',
        ]);
    }

    public function id(): int
    {
        return $this->route(self::ID);
    }

    public function name(): string
    {
        return $this->post(self::NAME);
    }

    public function description(): ?string
    {
        return $this->post(self::DESCRIPTION);
    }

    public function active(): ?bool
    {
        return $this->post(self::ACTIVE);
    }

    public function flag(): ?string
    {
        return $this->post(self::FLAG);
    }

    public function color(): ?string
    {
        return $this->post(self::COLOR);
    }
}

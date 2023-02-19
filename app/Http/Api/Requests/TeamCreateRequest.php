<?php

namespace App\Http\Api\Requests;

use Cmd\Entities\Team;
use Cmd\Payloads\TeamCreatePayload;

class TeamCreateRequest extends Request implements TeamCreatePayload
{
    public const NAME = 'name';

    public const DESCRIPTION = 'description';

    public const ACTIVE = 'active';

    public const FLAG = 'flag';

    public const COLOR = 'color';

    public function validation(): array
    {
        return $this->validate([
            self::NAME => 'required|max:255|unique:'.Team::class.','.self::NAME,
            self::DESCRIPTION => 'required|string',
            self::ACTIVE => 'required|bool',
            self::FLAG => 'required|string',
            self::COLOR => 'required|string',
        ]);
    }

    public function rules(): array
    {
        return [
            self::NAME => 'required|max:255|unique:'.Team::class.','.self::NAME,
            self::DESCRIPTION => 'required|string',
            self::ACTIVE => 'required|bool',
            self::FLAG => 'required|string',
            self::COLOR => 'required|string',
        ];
    }

    public function name(): string
    {
        return $this->get(self::NAME);
    }

    public function description(): ?string
    {
        return $this->get(self::DESCRIPTION);
    }

    public function active(): ?bool
    {
        return $this->get(self::ACTIVE);
    }

    public function flag(): ?string
    {
        return $this->get(self::FLAG);
    }

    public function colors(): ?string
    {
        return $this->get(self::COLOR);
    }
}

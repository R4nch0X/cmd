<?php

namespace Cmd\Payloads;

interface TeamCreatePayload
{
    public function name(): string;

    public function description(): ?string;

    public function active(): ?bool;

    public function flag(): ?string;

    public function colors(): ?string;
}
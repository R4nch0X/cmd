<?php

namespace Cmd\Payloads;

interface TeamUpdatePayload
{
    public function name(): string;

    public function description(): ?string;

    public function active(): ?bool;

    public function flag(): ?string;

    public function color(): ?string;
}

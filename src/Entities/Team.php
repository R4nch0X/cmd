<?php

namespace Cmd\Entities;

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

    public function __construct()
    {
    }
}

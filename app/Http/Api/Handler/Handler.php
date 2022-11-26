<?php

namespace App\Http\Api\Handler;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseHandler;

abstract class Handler extends BaseHandler
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;

    public static function routePriority(): int
    {
        return 0;
    }
}
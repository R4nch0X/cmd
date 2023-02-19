<?php

namespace App\Http\Api\Handler;

use App\Http\Utils\RouteDefiner;
use Illuminate\Contracts\Container\Container;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseHandler;

abstract class Handler extends BaseHandler implements routeDefiner
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;

    private Container $app;

    public function __construct(Container $app)
    {
        $this->app = $app;
    }
}

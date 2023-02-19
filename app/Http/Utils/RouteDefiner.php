<?php

namespace App\Http\Utils;

use Illuminate\Routing\Router;

interface RouteDefiner
{
    public static function defineRoute(Router $route): void;

    public static function routePriority(Router $route): int;
}

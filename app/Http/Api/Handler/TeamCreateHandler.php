<?php

namespace App\Http\Api\Handler;

use App\Http\Api\Requests\TeamCreateRequest;
use App\Http\Kernel;

use Cmd\Services\Teams;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Router;

#use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class TeamCreateHandler extends Handler
{

    public function __invoke(TeamCreateRequest $teamCreateRequest, Teams $team): JsonResponse
    {
        $teamCreateRequest->validate();
        $team->create();

        return responder()->success()->respond(Response::HTTP_CREATED);
    }


    public static function defineRoute(Router $router):void
    {
        $router->post('team', self::class)
            ->prefix('api')
            ->name(self::class)
            ->middleware([Kernel::API]);
    }
}
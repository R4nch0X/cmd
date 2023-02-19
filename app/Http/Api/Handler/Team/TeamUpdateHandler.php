<?php

namespace App\Http\Api\Handler;

use App\Http\Api\Requests\TeamUpdateRequest;
use App\Http\Kernel;
use App\Http\Utils\Handlers\Handler;
use App\Http\Utils\RouteDefiner;
use Cmd\Entities\Team;
use Cmd\Repositories\TeamRepository;
use Cmd\Services\Teams;
use Doctrine\ORM\EntityNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Router;

class TeamUpdateHandler extends Handler implements RouteDefiner
{
    /**
     * @throws EntityNotFoundException
     */
    public function __invoke(
        TeamUpdateRequest $teamUpdateRequest,
        TeamRepository $teamRepository,
        Teams $teams
    ): JsonResponse {
        /** @var Team $team */
        $team = $teamRepository->get($teamUpdateRequest->id());

        $teamUpdateRequest->validation();

        $teams->update($team, $teamUpdateRequest);

        return responder()->success()->respond(Response::HTTP_OK);
    }

    public static function defineRoute(Router $router): void
    {
        $router->put('team/{'.TeamUpdateRequest::ID.'}', self::class)
            ->name(self::class)
            ->prefix('api')
            ->middleware(Kernel::API);
    }

    public static function routePriority(Router $route): int
    {
        return 0;
    }
}

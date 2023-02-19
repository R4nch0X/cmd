<?php

namespace App\Providers;

use App\Infrastructure\Doctrine\Repositories as Doctrine;
use Cmd\Repositories;
use Doctrine\DBAL\Types\Type;
use Illuminate\Support\ServiceProvider;
use Ramsey\Uuid\Doctrine\UuidType;

class AppServiceProvider extends ServiceProvider
{
    private array $classBindings = [
        //Generic Repositories
        Repositories\PersistRepository::class => Doctrine\DoctrinePersistRepository::class,

        //Read Repositories
        Repositories\TeamRepository::class => Doctrine\DoctrineTeamRepository::class,
    ];

    /**
     * Register any application services.
     */
    public function register(): void
    {
        foreach ($this->classBindings as $abstract => $concrete) {
            if (is_array($concrete)) {
                $concrete = $concrete[$this->app->environment()] ?? $concrete['default'];
            }

            $this->app->bind($abstract, $concrete);
        }

        if (config('app.debug')) {
            $this->app->register(\Arcanedev\LogViewer\LogViewerServiceProvider::class);
            $this->app->register(\PrettyRoutes\ServiceProvider::class);
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Type::overrideType('guid', UuidType::class);
    }
}

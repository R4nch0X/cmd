<?php

namespace Database\Seeders;

use Cmd\Entities\Team;
use Cmd\Repositories\PersistRepository;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class TeamSeeder extends Seeder
{

#    use WithoutModelEvents;

    public const NUMBER_OF_SEEDERS = 20;

    private PersistRepository $persistRepository;

    public function __construct(PersistRepository $persistRepository)
    {
        $this->persistRepository = $persistRepository;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= self::NUMBER_OF_SEEDERS; $i++) {
            /** @var Team $team */
            $team = entity(Team::class)->make([
                'Name' => 'name'.$i
            ]);

            $this->persistRepository->save($team);
        }
    }
}

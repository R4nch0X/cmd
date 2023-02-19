<?php

namespace App\Development\Seeders;

use Cmd\Entities\Team;
use Cmd\Repositories\PersistRepository;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    use WithoutModelEvents;

    private const NUMBER_OF_SEEDERS = 20;

    private PersistRepository $persistRepository;

    /*
    public function __construct(PersistRepository $persistRepository)
    {
        $this->persistRepository = $persistRepository;
    }
    */

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= self::NUMBER_OF_SEEDERS; $i++) {
            /** @var Team $team */
            dd(entity(\Cmd\Entity\Team::class)->make([]));
            $team = entity(\Cmd\Entity\Team::class)->make([]);

            $this->persistRepository->save($team);
        }
    }
}

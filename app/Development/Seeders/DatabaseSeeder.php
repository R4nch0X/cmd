<?php

namespace App\Development\Seeders;

use Illuminate\Database\Seeder;
use Cmd\Repositories\PersistRepository;

class DatabaseSeeder extends Seeder
{
    private PersistRepository $persistRepository;

    public function __construct(PersistRepository $persistRepository)
    {
        $this->persistRepository = $persistRepository;
    }

    /**
     * Seed the application's database.
     */
    public function run()
    {
        #$this->call(App\Development\Seeder\TeamSeeder::class);
        $this->call(TeamSeeder::class);
    }
}

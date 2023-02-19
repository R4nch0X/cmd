<?php

namespace App\Development\Seeders;

use Cmd\Repositories\PersistRepository;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /*
    private PersistRepository $persistRepository;

    public function __construct(PersistRepository $persistRepository)
    {
        $this->persistRepository = $persistRepository;
    }
*/
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call(TeamSeeder::class);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
// Importa seus seeders aqui
use Database\Seeders\EnderecoSeeder;
use Database\Seeders\ClienteSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ClienteSeeder::class
        ]);
    }
}

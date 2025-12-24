<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'enel',
            'email' => 'enel@enel.com',
            'password' => bcrypt('enel'),
        ]);

        $this->call([
            JabatanSeeder::class,
        ]);
        $unit = \App\Models\UnitKerja::create(['nama_unit' => 'Sekretariat']);
        \App\Models\UnitKerja::create(['nama_unit' => 'Bidang Informatika']);
        \App\Models\UnitKerja::create(['nama_unit' => 'Bidang Komunikasi Publik']);
    }
}

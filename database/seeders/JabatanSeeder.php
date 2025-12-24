<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Jabatan;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jabatans = [
            ['nama_jabatan' => 'Kepala Dinas', 'keterangan' => 'Pimpinan tertinggi'],
            ['nama_jabatan' => 'Sekretaris', 'keterangan' => 'Pengelola administrasi'],
            ['nama_jabatan' => 'Kabid Informatika', 'keterangan' => 'Urusan jaringan dan software'],
            ['nama_jabatan' => 'Kabid Komunikasi Publik', 'keterangan' => 'Urusan humas dan informasi'],
            ['nama_jabatan' => 'Staf IT Support', 'keterangan' => 'Teknisi lapangan'],
            ['nama_jabatan' => 'Tenaga Ahli Programmer', 'keterangan' => 'Pengembang aplikasi'],
        ];

        foreach ($jabatans as $j) {
            Jabatan::create($j);
        }
    }
}

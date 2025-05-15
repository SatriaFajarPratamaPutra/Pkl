<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Anggota;
use App\Models\SubDivisi;
use Faker\Factory as Faker;

class AnggotaSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $subDivisis = SubDivisi::all();

        if ($subDivisis->isEmpty()) {
            $this->command->info('Tabel sub_divisis kosong. Silakan isi dulu sub divisi sebelum menjalankan seeder anggota.');
            return;
        }

        for ($i = 1; $i <= 50; $i++) {
            Anggota::create([
                'nama' => $faker->name,
                'wilayah_id' => $subDivisis->random()->id,
                'status' => $faker->randomElement(['Aktif', 'Non Aktif']),
            ]);
        }

        $this->command->info('Seeder anggota selesai dijalankan!');
    }
}

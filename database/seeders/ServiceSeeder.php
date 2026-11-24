<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        Service::updateOrCreate(
            ['nama' => 'Potong Rambut'],
            [
                'deskripsi' => 'Potong rambut lengkap dengan styling.',
                'durasi_menit' => 30,
                'harga' => 50000,
                'aktif' => true,
            ]
        );

        Service::updateOrCreate(
            ['nama' => 'Cukur Jenggot'],
            [
                'deskripsi' => 'Perawatan dan penataan jenggot.',
                'durasi_menit' => 20,
                'harga' => 30000,
                'aktif' => true,
            ]
        );
    }
}

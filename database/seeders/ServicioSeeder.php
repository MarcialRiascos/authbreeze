<?php

namespace Database\Seeders;

use App\Models\Servicio;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $servicios = [
            [
                'name' => 'Servicio de prueba',
                'description' => 'Este es un servicio de prueba',
                'precio' => 55999,
                'tiempo' => '50 minutos',
                'file' => 'assets/assets/img/news/img01.jpg',
                'file2' => 'assets/assets/img/news/img07.jpg',
                'file3' => 'assets/assets/img/news/img08.jpg',
                'file4' => 'assets/assets/img/news/img07.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        foreach ($servicios as $servicioData) {
            Servicio::create($servicioData);
        }
    }
}

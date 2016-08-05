<?php

use Illuminate\Database\Seeder;
use App\Models\Ticket;

class TicketsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ticket::create([
            'nombre' => 'Test Dev01',
            'descripcion' => 'Descripcion de Prueba01',
            'prioridad' => 'Medio',
            'fecha_solicitud' => \Carbon\Carbon::now()->toDateTimeString()
        ]);

        Ticket::create([
            'nombre' => 'Test Dev02',
            'descripcion' => 'Descripcion de Prueba02',
            'prioridad' => 'Urgente',
            'fecha_solicitud' => \Carbon\Carbon::now()->toDateTimeString()
        ]);

        Ticket::create([
            'nombre' => 'Test Dev03',
            'descripcion' => 'Descripcion de Prueba03',
            'prioridad' => 'Bajo',
            'fecha_solicitud' => \Carbon\Carbon::now()->toDateTimeString()
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class GoalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('goals')->insert([
        	'id' => '1',
            'tipo' => 'Secundario',
            'nombre' => 'Implementar módulo Objetivos',
            'descripcion' => 'Implementar módulo Objetivos con todas sus funciones',
            'id_usuario_origen' => '1',
            'id_usuario_destino' => '1',
            'id_objetivo_dependiente' => null,
            'year' => 2021,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('goals')->insert([
        	'id' => '2',
            'tipo' => 'Secundario',
            'nombre' => 'Implementar módulo AppAdministration',
            'descripcion' => 'Implementar módulo AppAdministration con todas sus funciones',
            'id_usuario_origen' => '1',
            'id_usuario_destino' => '1',
            'id_objetivo_dependiente' => null,
            'year' => 2021,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('goals')->insert([
        	'id' => '3',
            'tipo' => 'Hito',
            'nombre' => 'función crear',
            'descripcion' => 'Implementar módulo AppAdministration con todas sus funciones',
            'id_usuario_origen' => '1',
            'id_usuario_destino' => '1',
            'id_objetivo_dependiente' => '1',
            'year' => 2021,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}

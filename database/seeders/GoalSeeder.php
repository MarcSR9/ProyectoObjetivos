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
            'Tipo' => 'Secundario',
            'Nombre' => 'Implementar módulo Objetivos',
            'Descripcion' => 'Implementar módulo Objetivos con todas sus funciones',
            'Id_usuario_origen' => '1',
            'Id_usuario_destino' => '1',
            'Id_objetivo_dependiente' => null,
            'Year' => 2021,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('goals')->insert([
        	'id' => '2',
            'Tipo' => 'Secundario',
            'Nombre' => 'Implementar módulo AppAdministration',
            'Descripcion' => 'Implementar módulo AppAdministration con todas sus funciones',
            'Id_usuario_origen' => '1',
            'Id_usuario_destino' => '1',
            'Id_objetivo_dependiente' => null,
            'Year' => 2021,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('goals')->insert([
        	'id' => '3',
            'Tipo' => 'Hito',
            'Nombre' => 'función crear',
            'Descripcion' => 'Implementar módulo AppAdministration con todas sus funciones',
            'Id_usuario_origen' => '1',
            'Id_usuario_destino' => '1',
            'Id_objetivo_dependiente' => '1',
            'Year' => 2021,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}

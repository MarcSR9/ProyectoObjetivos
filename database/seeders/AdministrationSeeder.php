<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdministrationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('trimesters')->insert([
        	'trimestre' => '1',
            'estado' => 'desactivado',
        ]);

        DB::table('trimesters')->insert([
            'trimestre' => '2',
            'estado' => 'desactivado',
        ]);

        DB::table('trimesters')->insert([
            'trimestre' => '3',
            'estado' => 'desactivado',
        ]);

        DB::table('trimesters')->insert([
            'trimestre' => '4',
            'estado' => 'desactivado',
        ]);

        DB::table('trimesters')->insert([
            'trimestre' => 'Conclusiones',
            'estado' => 'desactivado',
        ]);
    }
}

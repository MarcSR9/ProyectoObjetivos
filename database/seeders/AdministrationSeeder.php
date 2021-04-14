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
        DB::table('app_administration')->insert([
        	'trimester_1' => 'enabled',
            'trimester_2' => 'disabled',
            'trimester_3' => 'disabled',
            'trimester_4' => 'disabled',
            'conclusions' => 'disabled',
        ]);
    }
}

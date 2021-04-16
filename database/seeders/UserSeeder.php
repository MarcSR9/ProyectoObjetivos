<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Marc',
            'surname' => 'Santolaria',
            'role' => 'Admin',
            'crea_objetivo_general' => 'true',
            'crea_objetivo_secundario' => 'true',
            'crea_objetivo_hito' => 'true',
            'email' => 'marc.santolaria@aeinnova.com',
            'password' => Hash::make('firewolf09'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'name' => 'Alex',
            'surname' => 'Santolaria',
            'role' => 'Director General',
            'crea_objetivo_general' => 'false',
            'crea_objetivo_secundario' => 'true',
            'crea_objetivo_hito' => 'true',
            'email' => 'alex.santolaria@aeinnova.com',
            'password' => Hash::make('firewolf09'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'name' => 'Kaladin',
            'surname' => 'Stormblessed',
            'role' => 'Default',
            'crea_objetivo_general' => 'false',
            'crea_objetivo_secundario' => 'false',
            'crea_objetivo_hito' => 'true',
            'email' => 'kaladin.stormblessed@aeinnova.com',
            'password' => Hash::make('firewolf09'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}

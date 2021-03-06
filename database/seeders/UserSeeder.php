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
            'name' => 'Admin',
            'surname' => 'Admin',
            'role' => 'Admin',
            'crea_objetivo_general' => 'true',
            'crea_objetivo_secundario' => 'true',
            'crea_objetivo_hito' => 'true',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345aA'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'name' => 'Director',
            'surname' => 'General',
            'role' => 'Director General',
            'crea_objetivo_general' => 'true',
            'crea_objetivo_secundario' => 'false',
            'crea_objetivo_hito' => 'false',
            'email' => 'director.general@gmail.com',
            'password' => Hash::make('12345aA'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'name' => 'Project/Product',
            'surname' => 'Manager',
            'role' => 'Default',
            'crea_objetivo_general' => 'false',
            'crea_objetivo_secundario' => 'true',
            'crea_objetivo_hito' => 'false',
            'email' => 'pm@gmail.com',
            'password' => Hash::make('12345aA'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'name' => 'Responsable',
            'surname' => 'Departamento',
            'role' => 'Default',
            'crea_objetivo_general' => 'false',
            'crea_objetivo_secundario' => 'false',
            'crea_objetivo_hito' => 'true',
            'email' => 'responsable@gmail.com',
            'password' => Hash::make('12345aA'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'name' => 'Auxiliar',
            'surname' => 'Departamento',
            'role' => 'Default',
            'crea_objetivo_general' => 'false',
            'crea_objetivo_secundario' => 'false',
            'crea_objetivo_hito' => 'false',
            'email' => 'auxiliar@gmail.com',
            'password' => Hash::make('12345aA'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'name' => 'Usuario',
            'surname' => 'Comod??n',
            'role' => 'Default',
            'crea_objetivo_general' => 'true',
            'crea_objetivo_secundario' => 'true',
            'crea_objetivo_hito' => 'true',
            'email' => 'comodin@gmail.com',
            'password' => Hash::make('12345aA'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}

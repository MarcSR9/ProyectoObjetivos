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
            'email' => 'marc.santolaria@aeinnova.com',
            'password' => Hash::make('firewolf09'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'name' => 'Alex',
            'surname' => 'Santolaria',
            'role' => 'Director General',
            'email' => 'alex.santolaria@aeinnova.com',
            'password' => Hash::make('firewolf09'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'name' => 'Kaladin',
            'surname' => 'Stormblessed',
            'role' => 'Default',
            'email' => 'kaladin.stormblessed@aeinnova.com',
            'password' => Hash::make('firewolf09'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}

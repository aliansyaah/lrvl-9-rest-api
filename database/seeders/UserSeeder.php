<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'email' => 'aliansyaah@admin.com',
                'username' => 'admin',
                'password' => '$2y$10$LbAcZ3Jp1RYMktIy75ozi.TxGcUoOx1tzfi1QNEO.5mVR7fZZ4J2O',   // 12345
                'firstname' => 'Admin',
                'lastname' => 'Admin',
                'created_at' => Carbon::now()->toDateTimeString()
            ],
            [
                'email' => 'bagyo@admin.com',
                'username' => 'bagyo',
                'password' => Hash::make('12345'),
                'firstname' => 'Subagyo',
                'lastname' => Str::random(10),
                'created_at' => Carbon::now()->toDateTimeString()
            ],
            [
                'email' => 'epul@admin.com',
                'username' => 'epul',
                'password' => Hash::make('12345'),
                'firstname' => 'Saepul',
                'lastname' => Str::random(10),
                'created_at' => Carbon::now()->toDateTimeString()
            ],
        ];
        DB::table('users')->insert($users);
    }
}

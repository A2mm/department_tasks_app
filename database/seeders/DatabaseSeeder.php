<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'firstname' => 'Admin',
            'lastname'  => 'Admin',
            'email'     => 'admin@admin.com',
            'password'  => bcrypt('Passw0rd#1234!'),
            'role'      => 'manager'
        ]);

        DB::table('users')->insert([
            'firstname' => 'Admin',
            'lastname'  => 'Admin',
            'email'     => 'employee@employee.com',
            'password'  => bcrypt('Passw0rd#1234!'),
            'role'      => 'employee',
            'parent_id' => 1,
        ]);
    }
}

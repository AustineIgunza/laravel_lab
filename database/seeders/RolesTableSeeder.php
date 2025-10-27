<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            ['roleName' => 'Admin'],
            ['roleName' => 'Editor'],
            ['roleName' => 'Viewer'],
            ['roleName' => 'Student'],
            ['roleName' => 'Instructor'],
            ['roleName' => 'Guest'],
            ['roleName' => 'Moderator'],
        ];

        DB::table('roles')->insert($roles);
    }
}

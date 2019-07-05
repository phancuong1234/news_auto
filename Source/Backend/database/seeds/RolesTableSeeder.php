<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name_role' => 'admin'],
            ['name_role' => 'mod'],
            ['name_role' => 'editor'],
            ['name_role' => 'user']
        ];
        DB::table('roles')->truncate();
        DB::table('roles')->insert($data);
    }
}

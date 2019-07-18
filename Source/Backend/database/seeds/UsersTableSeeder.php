<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['username' => 'cuong', 'password' => '$2y$10$LzDIPnaxqoydHssa1MYUFOb.qC9MrubJzQQdv4FQbjYtLo5i5W65G', 'email' => 'cuong@gmail.com', 'id_role' => 1]
        ];
        DB::table('users')->truncate();
        DB::table('users')->insert($data);
    }
}

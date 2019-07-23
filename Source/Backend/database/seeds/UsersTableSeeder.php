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
            ['username' => 'cuongadmin', 'password' => '$2y$10$LzDIPnaxqoydHssa1MYUFOb.qC9MrubJzQQdv4FQbjYtLo5i5W65G', 'email' => 'cuong1@gmail.com', 'id_role' => 1, 'function' => 111],
            ['username' => 'cuongmod', 'password' => '$2y$10$LzDIPnaxqoydHssa1MYUFOb.qC9MrubJzQQdv4FQbjYtLo5i5W65G', 'email' => 'cuong2@gmail.com', 'id_role' => 2, 'function' => 111],
            ['username' => 'cuongeditor', 'password' => '$2y$10$LzDIPnaxqoydHssa1MYUFOb.qC9MrubJzQQdv4FQbjYtLo5i5W65G', 'email' => 'cuong3@gmail.com', 'id_role' => 3, 'function' => 111],
            ['username' => 'cuonguser', 'password' => '$2y$10$LzDIPnaxqoydHssa1MYUFOb.qC9MrubJzQQdv4FQbjYtLo5i5W65G', 'email' => 'cuong4@gmail.com', 'id_role' => 4, 'function' => 111],
        ];
        DB::table('users')->truncate();
        DB::table('users')->insert($data);
    }
}

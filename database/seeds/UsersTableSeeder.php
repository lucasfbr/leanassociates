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
        $user = DB::table('users')->insert([
                'name' => 'Lucas Rosa',
                'email' => 'lucas-fbr@hotmail.com',
                'password' => bcrypt('123456'),
                'role' => '0'
        ]);

        DB::table('profiles')->insert(['user_id'=>$user]);

    }
}

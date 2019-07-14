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
        //
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@test.com',
            'password' => Hash::make('testadmin')
        ]);

        DB::table('users')->insert([
            'name' => 'Moderator',
            'email' => 'moderator@test.com',
            'password' => Hash::make('testmoderator')
        ]);

        DB::table('users')->insert([
            'name' => 'User',
            'email' => 'user@test.com',
            'password' => Hash::make('testuser')
        ]);
    }
}

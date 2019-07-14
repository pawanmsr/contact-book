<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('contacts')->insert([
            'user' => 'admin@test.com',
            'name' => 'Pawan Mishra',
            'email' => 'pawanmsr@outlook.com',
            'phone' => 8756748933,
            'address' => 'Gurgaon',
            'pin' => 122009
        ]);

        DB::table('contacts')->insert([
            'user' => 'moderator@test.com',
            'name' => 'Pawan Mishra',
            'email' => 'pawanmsr@outlook.com',
            'phone' => 8756748933,
            'address' => 'Gurgaon',
            'pin' => 122009
        ]);

        DB::table('contacts')->insert([
            'user' => 'user@test.com',
            'name' => 'Pawan Mishra',
            'email' => 'pawanmsr@outlook.com',
            'phone' => 8756748933,
            'address' => 'Gurgaon',
            'pin' => 122009
        ]);
    }
}

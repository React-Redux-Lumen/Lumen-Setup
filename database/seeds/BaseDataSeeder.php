<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BaseDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'firstname' => 'super',
            'lastname' => 'admin',
            'displayname' => 'admin',
            'email' => 'admin@gmail.com', 
            'username' => 'admin', 
            // 'password' => bcrypt('abc123'),
            'password' => app('hash')->make('abc123'),
            'address' => 'admin home'
        ]);
    }
}

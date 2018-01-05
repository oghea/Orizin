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
        App\User::create([
            'name' => "Admin",
            'email' => "admin@gmail.com",
            'password' => bcrypt('secret'),
            'dob' => "2018-01-05",
            'images' => "default.jpg",
            'role' => "admin"
        ]);
    }
}

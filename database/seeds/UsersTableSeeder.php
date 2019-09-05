<?php

use App\Models\User;
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
        User::create([
            'name' => 'Mustafa',
            'email' => 'mustafa@test.test',
            'password' => bcrypt('12345678'),
        ]);

        User::create([
            'name' => 'Soekarno',
            'email' => 'soekarno@test.test',
            'password' => bcrypt('12345678'),
        ]);
    }
}

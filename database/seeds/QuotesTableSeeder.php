<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Quote;
use App\Models\User;

class QuotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        // $faker = Faker::create();
        // $users = User::all()->toArray();

        // for ($i=0; $i <100 ; $i++){
        //     Quote::create([
        //         'judul' => $faker->jobTitle,
        //         'slug' =>  str_slug($faker->title),
        //         'subject' => $faker->jobTitle,
        //         'user_id' => '1'
        //     ]);
        // }
    }
}

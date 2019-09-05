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

        Quote::create([
            'judul' => 'Merdeka atau Mati',
            'slug' => str_slug('Merdeka atau Mati'),
            'subject' => 'Lebih baik mati dengan kebanggaan daripada hidup penuh kehinaan',
            'user_id' => '1'
        ]);

        Quote::create([
            'judul' => 'Cinta dan Khianat',
            'slug' => str_slug('Cinta dan Khianat'),
            'subject' => 'Mencintai dan terluka lebih baik dibanding tak pernah mencintai',
            'user_id' => '2'
        ]);
    }
}

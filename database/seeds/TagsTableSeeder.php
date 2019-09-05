<?php

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create([
            'name' => 'cinta'
        ]);

        Tag::create([
            'name' => 'sedih'
        ]);

        Tag::create([
            'name' => 'semangat'
        ]);

        Tag::create([
            'name' => 'nasionalisme'
        ]);
    }
}

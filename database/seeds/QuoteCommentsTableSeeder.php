<?php

use App\Models\QuoteComment;
use Illuminate\Database\Seeder;

class QuoteCommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        QuoteComment::create([
            'quote_id' => '1',
            'tag_id' => '1'
        ]);
        QuoteComment::create([
            'quote_id' => '1',
            'tag_id' => '2'
        ]);
        QuoteComment::create([
            'quote_id' => '2',
            'tag_id' => '1'
        ]);
        QuoteComment::create([
            'quote_id' => '2',
            'tag_id' => '3'
        ]);
        QuoteComment::create([
            'quote_id' => '2',
            'tag_id' => '4'
        ]);
    }
}

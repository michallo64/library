<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
            'author_id' => 1,
            'title' => 'Testing Book',
            'is_borrowed' => false,
        ]);
    }
}

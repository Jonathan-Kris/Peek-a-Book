<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ["category_name"=>'Manga (Japan)'],
            ["category_name"=>"Manhwa (Korean)"],
            ["category_name"=>"Manhua (Chinese)"],
            ["category_name"=>"Light Novel"],
            ["category_name"=>"Visual Novel"],
            ["category_name"=>"Web Novel"],
        ]);
    }
}

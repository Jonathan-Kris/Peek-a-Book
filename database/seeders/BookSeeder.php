<?php

namespace Database\Seeders;

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
        DB::table('products')->insert([
            [
                "category_id" => 1,
                "product_title" => "Dr Stone",
                "product_desc" => "The world suddenly went to the stone age. Science will bring back humanity once again",
                "product_price" => 25000,
                "product_stock" => 50,
                "image_path" => "images/default.jpg"
            ],
            [
                "category_id" => 1,
                "product_title" => "Naruto",
                "product_desc" => "Hokage Konoha Ninja Letsgo",
                "product_price" => 50000,
                "product_stock" => 59,
                "image_path" => "images/default.jpg"
            ],
            [
                "category_id" => 2,
                "product_title" => "Solo Leveling",
                "product_desc" => "OP and exciting, here we go",
                "product_price" => 30000,
                "product_stock" => 45,
                "image_path" => "images/default.jpg"
            ],
            [
                "category_id" => 2,
                "product_title" => "Ranker's Return",
                "product_desc" => "Return of the ranker",
                "product_price" => 40000,
                "product_stock" => 70,
                "image_path" => "images/default.jpg"
            ],
            [
                "category_id" => 3,
                "product_title" => "Release the witch",
                "product_desc" => "Witch is persecuted, but one man will save them",
                "product_price" => 50000,
                "product_stock" => 79,
                "image_path" => "images/default.jpg"
            ],
            [
                "category_id" => 4,
                "product_title" => "Overgeared",
                "product_desc" => "God Grid rule the world",
                "product_price" => 99000,
                "product_stock" => 10,
                "image_path" => "images/default.jpg"
            ],
            [
                "category_id" => 4,
                "product_title" => "Second Coming of Gluttone",
                "product_desc" => "Seol Jihu will save the paradise",
                "product_price" => 50000,
                "product_stock" => 69,
                "image_path" => "images/default.jpg"
            ],
            [
                "category_id" => 6,
                "product_title" => "Shield Hero",
                "product_desc" => "Naofumi is the shield hero",
                "product_price" => 35000,
                "product_stock" => 70,
                "image_path" => "images/default.jpg"
            ]
        ]);
    }
}

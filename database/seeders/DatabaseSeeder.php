<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\TransactionHeader;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'user_name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt(12345678),
            'role' => 'seller',
        ]);

        User::create([
            'user_name' => 'Jonathan Kristanto',
            'email' => 'jokris@gmail.com',
            'password' => bcrypt(12345678),
            'role' => 'customer',
        ]);

        User::create([
            'user_name' => 'Henry',
            'email' => 'henry@gmail.com',
            'password' => bcrypt(12345678),
            'role' => 'customer',
        ]);

        Category::factory(6)->create();

        TransactionHeader::factory(10)->create();
    }
}

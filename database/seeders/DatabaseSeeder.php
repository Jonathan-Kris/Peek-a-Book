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
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt(12345),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Customer',
            'email' => 'customer@customer.com',
            'password' => bcrypt(12345),
            'role' => 'customer',
        ]);

        $this->call([
            CategorySeeder::class,
            BookSeeder::class
        ]);
    }
}

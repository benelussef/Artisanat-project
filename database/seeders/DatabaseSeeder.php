<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Database\Seeders\OrderSeeder;
use Database\Seeders\ProductSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\AdminTableSeeder;
use Database\Seeders\UsersTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
        Category::factory(10)->create();
        Product::factory(20)->create();
        Order::factory(10)->create();
        Admin::factory(1)->create();

       /* $this->call(UsersTableSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(AdminTableSeeder::class);*/


    }
}

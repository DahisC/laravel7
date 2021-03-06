<?php

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
        // $this->call(UsersTableSeeder::class);
        $this->call([
            UsersTableSeeder::class,
            // NewsTableSeeder::class,
            ShippingStatusTable::class,
            OrderStatusTable::class,
        ]); // 呼叫 News 的 seeder
    }
}

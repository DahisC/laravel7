<?php

use App\ShippingStatus;
use Illuminate\Database\Seeder;

class ShippingStatusTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $defaultStatus = ['備貨中', '發貨中', '已發貨', '已到達', '已取貨', '退貨中', '已退貨'];
        foreach ($defaultStatus as $status) {
            ShippingStatus::create([
                'name' => $status
            ]);
        }
    }
}

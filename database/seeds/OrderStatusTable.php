<?php

use App\OrderStatus;
use Illuminate\Database\Seeder;

class OrderStatusTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $defaultStatus = ['處理中', '已確認', '已完成', '已取消'];
        foreach ($defaultStatus as $status) {
            OrderStatus::create([
                'name' => $status
            ]);
        }
    }
}

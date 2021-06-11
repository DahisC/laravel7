<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('remark')->nullable();
            $table->string('payment_method');
            $table->string('shipping_method');
            $table->boolean('payment_status')->default(0);
            $table->string('shipping_status_id')->default(0);
            $table->integer('shipping_fee');
            $table->string('order_status_id')->default();
            $table->string('recipient_email');
            $table->string('recipient_name');
            $table->string('recipient_phone');
            $table->string('recipient_county');
            $table->string('recipient_district');
            $table->string('recipient_zipcode');
            $table->string('recipient_address');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}

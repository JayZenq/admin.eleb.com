<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_category_id');
            $table->string('shop_name');
            $table->string('shop_img');
            $table->float('shop_rating',8,2);
            $table->boolean('brand');
            $table->boolean('on_time');
            $table->boolean('fengniao');
            $table->boolean('bao');
            $table->boolean('piao');
            $table->boolean('zhun');
            $table->float('start_send',8,2);
            $table->float('send_cost',8,2);
            $table->string('notice');
            $table->string('discount');
            $table->integer('status');
            $table->engine='InnoDb';
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shops');
    }
}

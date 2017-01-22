<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('id_user');
            $table->string('code_order');
            $table->string('code');
            $table->string('code_parent');
            $table->string('code_kind');
            $table->string('code_type');
            $table->string('code_merk');
            $table->string('pict_product1');
            $table->string('pict_product2');
            $table->string('name');
            $table->text('desc');
            $table->string('price');
            $table->string('slug');
            $table->string('status');
            $table->integer('kuantitas');
            $table->decimal('subtotal', 10, 2);
            $table->decimal('total', 10, 2);
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
        Schema::dropIfExists('orders');
    }
}

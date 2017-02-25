<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->string('master_type_id');
            $table->string('type_id');
            $table->string('sub_type_id');
            $table->string('code_merk');
            $table->string('pict_product1');
            $table->string('pict_product2');
            $table->string('pict_product3');
            $table->string('name');
            $table->text('desc');
            $table->string('price');
            $table->string('slug');
            $table->integer('kuantitas');
            $table->decimal('subtotal', 10, 2);
            $table->decimal('sub_total', 10, 2);
            $table->decimal('ongkir', 10, 2);
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
        Schema::dropIfExists('carts');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart', function (Blueprint $table) {
            $table->Increments('id_cart');
            $table->integer('id_item')->unsigned();
            $table->foreign('id_item')->references('id_item')->on('item')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('id_guest')->unsigned();
            $table->foreign('id_guest')->references('id_guest')->on('guest')->onDelete('cascade')->onUpdate('cascade');
            $table->string('qty');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('bill', function (Blueprint $table) {
            $table->Increments('id_bill');
            $table->integer('id_item')->unsigned();
            $table->foreign('id_item')->references('id_item')->on('item')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('id_guest')->unsigned();
            $table->foreign('id_guest')->references('id_guest')->on('guest')->onDelete('cascade')->onUpdate('cascade');
            $table->string('qty');
            $table->string('bill_appears');
            $table->string('bill_status');
            $table->string('code_payment');
            $table->string('payment_method');
            $table->date('date_checkout');
            $table->string('no_checkout');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bill');
    }
}

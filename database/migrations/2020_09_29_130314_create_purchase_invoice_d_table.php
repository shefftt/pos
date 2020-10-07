<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseInvoiceDTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_invoice_d', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->string('price');
            $table->string('invoice_id');
            $table->string('qyt');
            $table->string('current_qyt');
            $table->float('sub_total');

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
        Schema::dropIfExists('purchase_invoice_d');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InventoryTransactionLog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_transaction_log', function (Blueprint $table) {
            $table->increments('id');

            $table->string('product_id');
            $table->string('name');
            $table->float('quantity');
            $table->string('supplier_id');
            $table->string('unit');
            $table->string('category');
            $table->float('price');
            $table->string('alert_value')->nullable();
            $table->string('description')->nullable();
            $table->string('process');
            $table->string('created_by');
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
        Schema::dropIfExists('inventory_transaction_log');
    }
}

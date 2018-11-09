<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceItemListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_item_lists', function (Blueprint $table) {
            $table->string('invoice_itemid')->primary();
            $table->string('invoice_id');
            $table->string('itemName');
            $table->string('qty');
            $table->string('price');
            $table->string('category');
            $table->string('unit');
            $table->string('total_price');
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
        Schema::dropIfExists('invoice_item_lists');
    }
}

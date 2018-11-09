<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTransactionLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_transaction_logs', function (Blueprint $table) {
            $table->string('auditid')->primary();
            $table->string('tracking_no');
            $table->string('itemid');
            $table->integer('qty');
            $table->string('remarks')->nullable();
            $table->string('requested_by');
            $table->string('status');
            $table->string('released_by')->nullable();
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
        Schema::dropIfExists('product_transaction_logs');
    }
}

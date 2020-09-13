<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaxTransactionsDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tax_transactions_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('trans_type');
            $table->integer('trans_no');
            $table->date('trans_date');
            $table->integer('tax_type_id');
            $table->integer('rate');
            $table->integer('included_in_price');
            $table->integer('net_amount');
            $table->integer('amount');
            $table->string('memo');
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
        Schema::dropIfExists('tax_transactions_details');
    }
}

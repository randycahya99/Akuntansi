<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCashTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cash', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('cash_type', ['Kas Masuk','Kas Keluar']);
            $table->date('date');
            $table->string('reference');
            $table->string('account_name');
            $table->string('name');
            $table->string('description');
            $table->integer('total');
            $table->enum('posting', ['no','yes'])->default('no');
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
        Schema::dropIfExists('cash');
    }
}

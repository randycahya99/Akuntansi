<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJournalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journal', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('trans_date');
            $table->string('reference');
            $table->string('description');
            $table->string('debit_account');
            $table->string('kredit_account');
            $table->integer('debit');
            $table->integer('kredit');
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
        Schema::dropIfExists('journal');
    }
}

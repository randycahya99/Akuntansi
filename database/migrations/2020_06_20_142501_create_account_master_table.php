<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountMasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_master', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('account_code')->unique();
            $table->string('account_name');
            $table->integer('saldo_account');
            $table->string('account_jenis_name');
            $table->string('account_type_name');
            $table->timestamps();

            //FK
            $table->bigInteger('account_jenis_id')->nullable();
            $table->bigInteger('account_type_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account_master');
    }
}

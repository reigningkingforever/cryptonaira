<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email');
            $table->unsignedBigInteger('base_currency');
            $table->double('base_amount');
            $table->boolean('base_status')->nullable(0);
            $table->unsignedBigInteger('target_currency');
            $table->double('target_amount');
            $table->string('bank_code'); //bankcode
            $table->string('account_number');
            $table->boolean('target_status')->default(0);
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
        Schema::dropIfExists('payments');
    }
}

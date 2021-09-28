<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ip_address');
            $table->boolean('banned')->default(0);
            $table->string('timezone');
            $table->string('country');
            $table->string('state');
            $table->string('city');
            $table->string('device_type');
            $table->string('device_name');
            $table->string('platform');
            $table->string('browser');
            $table->string('language');
            $table->string('url');
            $table->string('method'); 
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
        Schema::dropIfExists('locations');
    }
}

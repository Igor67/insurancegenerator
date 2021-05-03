<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInsurancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insurances', function (Blueprint $table) {
            $table->id();
            $table->string('passportNumber');
            $table->string('login');
            $table->string('days');
            $table->string('startdate');
            $table->string('prem');
            $table->string('enddate');
            $table->string('summ');
            $table->string('fran');
            $table->string('polNumber');
            $table->string('type');
            $table->string('createDate');

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
        Schema::dropIfExists('insurances');
    }
}

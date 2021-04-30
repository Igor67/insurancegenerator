<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('giverName');
            $table->string('giverLastName');
            $table->string('passportNumber');
            $table->string('birthday');
            $table->string('home');
            $table->string('lastNameGirl');
            $table->string('country');
            $table->string('citizenship');
            $table->string('placeOfBirth');
            $table->string('passportDate');
            $table->string('passportWhoGave');
            $table->string('lastVizaBeginning1');
            $table->string('lastVizaEnding1');
            $table->string('lastVizaBeginning2');
            $table->string('lastVizaEnding2');
            $table->string('lastVizaBeginning3');
            $table->string('lastVizaEnding3');
            $table->string('lastVizaBeginning4');
            $table->string('lastVizaEnding4');
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
        Schema::dropIfExists('clients');
    }
}

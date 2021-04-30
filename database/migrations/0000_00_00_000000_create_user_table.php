<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {

            $table->increments('id');

            $table->string('name');

            $table->string('email');

            $table->string('password');

            $table->string('remember_token')->nullable();

            $table->timestamp('created_at')->nullable();

            $table->timestamp('updated_at')->nullable();


            $table->unique(['email']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
}

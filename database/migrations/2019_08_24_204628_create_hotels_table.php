<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('username')->nullable(false);
            $table->string('password')->nullable(false);
            $table->string('email')->nullable(false);
            $table->string('country');
            $table->string('city');
            $table->string('district');
            $table->bigInteger('telephone');
            $table->bigInteger('click')->default(0)->nullable(false);
            $table->timestamp('email-verified-at');
            $table->string('remember-token');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotels');
    }
}

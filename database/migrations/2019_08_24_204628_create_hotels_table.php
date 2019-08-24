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
            $table->string('email')->nullable(false);
            $table->timestamp('email-verified-at');
            $table->string('password')->nullable(false);
            $table->string('remember-token');
            $table->string('country');
            $table->string('city');
            $table->string('district');
            $table->string('telephone');
            $table->bigInteger('clicks')->default(0)->nullable(false);

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

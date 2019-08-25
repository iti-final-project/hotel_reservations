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
            $table->string('username')->nullable();
            $table->string('email')->nullable()->unique();
            $table->timestamp('email-verified-at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('district')->nullable();
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

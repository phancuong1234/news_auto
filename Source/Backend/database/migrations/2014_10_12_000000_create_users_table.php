<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username')->unique();
            $table->string('password');
            $table->string('email')->unique();
            $table->string('fullname')->nullable();
            $table->string('phone')->nullable();
            $table->string('birth_date')->nullable();
            $table->string('address')->nullable();
            $table->string('gender')->nullable();
            $table->integer('id_role');
            $table->string('function')->default('000');
            $table->string('image')->default('no-image.png');
            $table->tinyInteger('active')->default(1);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}

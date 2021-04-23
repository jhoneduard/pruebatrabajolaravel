<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('categoria', function (Blueprint $table) {
            $table->bigInteger('id_categoria')->unsigned();
            $table->string('nombre');
            $table->primary('id_categoria');
        });

        Schema::create('palabras', function (Blueprint $table) {
            $table->bigInteger('id_palabra')->unsigned();
            $table->text('nombre');
            $table->bigInteger('id_categoria')->unsigned();
            $table->primary('id_palabra');

            $table->foreign('id_categoria')
            ->references('id_categoria')
            ->on('categoria')
            ->onDelete('restrict');

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

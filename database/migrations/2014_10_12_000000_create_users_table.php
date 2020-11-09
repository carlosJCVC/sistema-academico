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
            $table->increments('id');
            $table->string('name');
            $table->string('lastname')->nullable();
            $table->string('lastnamemother')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('nro_docs')->nullable();
            $table->string('auxiliar_name')->nullable();
            $table->string('gender')->nullable();
            $table->string('ci');
            $table->string('cod_sis');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('direction')->nullable();
            $table->string('name_matter')->nullable();
            $table->enum('status', ['HABILITADO', 'INHABILITADO'])->default('HABILITADO');
            $table->text('observations')->nullable();
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

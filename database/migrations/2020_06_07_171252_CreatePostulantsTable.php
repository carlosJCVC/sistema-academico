<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostulantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postulants', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->integer('item_id');
            $table->string('lastname');
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('nro_certificates')->nullable();
            $table->string('nro_docs')->nullable();
            $table->string('auxiliar_name')->nullable();
            $table->string('gender');
            $table->string('ci');
            $table->string('cod_sis');
            $table->string('email');
            $table->enum('status', ['HABILITADO', 'INHABILITADO'])->default('HABILITADO');
            $table->text('observations')->nullable();

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
        Schema::dropIfExists('postulants');
    }
}

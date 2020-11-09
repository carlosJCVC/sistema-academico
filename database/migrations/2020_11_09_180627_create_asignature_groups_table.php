<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsignatureGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignature_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('group');
            $table->integer('asignature_id')->unsigned();
            $table->foreign('asignature_id')->references('id')->on('asignatures')->onDelete('cascade');
            
            $table->timestamps();
        });

        Schema::create('asignature_groups_teachers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('group_id')->unsigned();
            $table->foreign('group_id')->references('id')->on('asignature_groups')->onDelete('cascade');
            
            $table->integer('teacher')->unsigned();
            $table->foreign('teacher')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('titular')->default(true);
            $table->string('from');
            $table->string('to');
            $table->string('day');
            
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
        Schema::dropIfExists('asignature_groups_teachers');
        Schema::dropIfExists('asignature_groups');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academics', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->boolean('status')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('areas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('academic_id')->unsigned();
            $table->string('slug');
            $table->text('description');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('academic_id')
                ->references('id')
                ->on('academics');
            // ->onDelete('cascade');
        });

        Schema::create('authorities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('area_id')->unsigned();
            $table->string('slug');
            $table->string('user');
            $table->string('role');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('area_id')
                ->references('id')
                ->on('areas');
            // ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('authorities');
        Schema::dropIfExists('areas');
        Schema::dropIfExists('academics');
    }
}

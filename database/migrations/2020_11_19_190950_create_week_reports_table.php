<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeekReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('week_reports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user');
            $table->string('asignature');
            $table->string('group');
            $table->date('date');
            $table->text('bodyclass');
            $table->text('resourcesbody');
            $table->text('observations');
            $table->text('file')->nullable();
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
        Schema::dropIfExists('week_reports');
    }
}

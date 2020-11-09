<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnnouncemetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->string('code');
            $table->string('level')->nullable();
            $table->string('teacher')->nullable();
            $table->enum('destine', ['DOCENCIA', 'LABORATORIO']);

            $table->timestamps();
        });

        Schema::create('announcements', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('academic_id')->unsigned();
            $table->integer('item_id')->unsigned();
            $table->string('title');
            $table->string('description')->unique();
            $table->string('code');
            $table->string('gestion');
            $table->date('start_date_announcement');
            $table->date('end_date_announcement');
            $table->date('start_date_calification');
            $table->date('end_date_calification');
            $table->timestamps();

            $table->foreign('academic_id')
                ->references('id')
                ->on('academics')
                ->onDelete('cascade');

            $table->foreign('item_id')
                ->references('id')
                ->on('items')
                ->onDelete('cascade');
        });

        Schema::create('requirements', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('announcement_id')->unsigned();

            $table->string('title')->nullable();
            $table->integer('quantity');
            $table->string('hours');
            $table->string('destine');
            $table->string('description')->nullable();
            $table->boolean('required')->default(false);
            $table->timestamps();

            $table->foreign('announcement_id')
                ->references('id')
                ->on('announcements')
                ->onDelete('cascade');
        });

        Schema::create('conditions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('announcement_id')->unsigned();

            $table->text('description');
            $table->timestamps();

            $table->foreign('announcement_id')
                ->references('id')
                ->on('announcements')
                ->onDelete('cascade');
        });

        Schema::create('documents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('announcement_id')->unsigned();

            $table->text('description');
            $table->timestamps();

            $table->foreign('announcement_id')
                ->references('id')
                ->on('announcements')
                ->onDelete('cascade');
        });

        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('announcement_id')->unsigned();

            $table->string('title');
            $table->date('date');
            $table->timestamps();

            $table->foreign('announcement_id')
                ->references('id')
                ->on('announcements')
                ->onDelete('cascade');
        });

        Schema::create('califications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('announcement_id')->unsigned();

            $table->string('title');
            $table->float('percentage');
            $table->text('description');
            $table->timestamps();

            $table->foreign('announcement_id')
                ->references('id')
                ->on('announcements')
                ->onDelete('cascade');
        });

        Schema::create('sub_califications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('calification_id')->unsigned();

            $table->string('title');
            $table->float('percentage');
            $table->text('description');
            $table->timestamps();

            $table->foreign('calification_id')
                ->references('id')
                ->on('califications')
                ->onDelete('cascade');
        });

        Schema::create('knowledge_ratings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('announcement_id')->unsigned();

            $table->string('title');
            $table->float('percentage');
            $table->text('description');
            $table->timestamps();

            $table->foreign('announcement_id')
                ->references('id')
                ->on('announcements')
                ->onDelete('cascade');
        });

        Schema::create('sub_ratings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rating_id')->unsigned();

            $table->string('title');
            $table->float('percentage');
            $table->text('description');
            $table->timestamps();

            $table->foreign('rating_id')
                ->references('id')
                ->on('knowledge_ratings')
                ->onDelete('cascade');
        });

        Schema::create('announcement_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('announcement_id')->unsigned();

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
        Schema::dropIfExists('publishes');
        Schema::dropIfExists('conditions');
        Schema::dropIfExists('documents');
        Schema::dropIfExists('events');
        Schema::dropIfExists('sub_califications');
        Schema::dropIfExists('califications');
        Schema::dropIfExists('sub_ratings');
        Schema::dropIfExists('knowledge_ratings');
        
        Schema::dropIfExists('announcement_user');
        Schema::dropIfExists('requirements');
        Schema::dropIfExists('announcements');
        Schema::dropIfExists('items');
    }
}

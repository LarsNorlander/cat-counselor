<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grades', function (Blueprint $table) {
            $table->increments('id');
            $table->double('math');
            $table->double('english');
            $table->double('science');
            $table->double('computer');
            $table->double('mapeh');
            $table->double('tle');
            $table->double('filipino');
            $table->double('social_studies');
            $table->double('values');
            $table->integer('year');
            $table->integer('owner_id')->unsigned();
            $table->foreign('owner_id')->references('id')->on('users');
            $table->timestamps();
        });

        Schema::create('ncae', function (Blueprint $table){
            $table->increments('id');
            $table->integer('scientific_ability');
            $table->integer('reading_comprehension');
            $table->integer('verbal_ability');
            $table->integer('mathematical_ability');
            $table->integer('logical_reasoning_ability');
            $table->integer('clerical_ability');
            $table->integer('non_verbal_ability');
            $table->integer('visual_manipulative_skill');
            $table->integer('humss');
            $table->integer('stem');
            $table->integer('abm');
            $table->integer('owner_id')->unsigned();
            $table->foreign('owner_id')->references('id')->on('users');
            $table->timestamps();
        });

        Schema::create('subjects', function (Blueprint $table){
            $table->increments('id');
            $table->string('subject_title');
            $table->timestamps();
        });

        Schema::create('awards', function (Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->integer('subject_id')->unsigned();
            $table->foreign('subject_id')->references('id')->on('subjects');
            $table->integer('owner_id')->unsigned();
            $table->foreign('owner_id')->references('id')->on('users');
            $table->timestamps();
        });

        Schema::create('preferences', function (Blueprint $table){
            $table->increments('id');
            $table->integer('owner_id')->unsigned();
            $table->foreign('owner_id')->references('id')->on('users');
            $table->text('preference');
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
        Schema::drop('preferences');
        Schema::drop('awards');
        Schema::drop('subjects');
        Schema::drop('ncae');
        Schema::drop('grades');
    }
}

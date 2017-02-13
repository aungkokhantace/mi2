<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventAbstractTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_abstract', function(Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('email');
            $table->integer('country');
            $table->integer('medical_speciality_id')->default(0);
            $table->text('medical_speciality_other')->nullable();
            $table->string('abstract_file_path');
            $table->integer('events_id')->default(1);
            $table->date('registered_date');
            $table->integer('confirmed_by');
            $table->date('confirmed_date');
            $table->string('status');
            $table->boolean('registered');

            //Common to all table ----------------------------------------------
            $table->string('created_by',100)->nullable();
            $table->string('updated_by',100)->nullable();
            $table->string('deleted_by',100)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('event_abstract');
    }
}

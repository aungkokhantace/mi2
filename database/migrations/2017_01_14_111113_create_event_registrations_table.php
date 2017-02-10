<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_registrations', function(Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('title');
            $table->string('email');
            $table->integer('country');
            $table->text('where_work')->nullable();
            $table->integer('medical_speciality_id')->default(0);
            $table->text('medical_speciality_other')->nullable();
            $table->string('phone_no');
            $table->integer('registration_category');
            $table->string('payment_type');
            $table->string('status');
            $table->integer('events_id')->default(1);
            $table->date('registered_date');
            $table->integer('confirmed_by');
            $table->date('confirmed_date');
            $table->string('payment_reference_path');

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
        Schema::drop('event_registrations');
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAbstractTitleToEventAbstractTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('event_abstract', function (Blueprint $table) {
            $table->text('abstract_title')->after('country');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('event_abstract', function (Blueprint $table) {
            $table->dropColumn('abstract_title');
        });
    }
}

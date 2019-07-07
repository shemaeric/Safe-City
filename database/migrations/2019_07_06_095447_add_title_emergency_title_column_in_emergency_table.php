<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTitleEmergencyTitleColumnInEmergencyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('emergency_table', function (Blueprint $table) {
            //
            $table->string('emergency_title')->after('help_seeker_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('emergency_table', function (Blueprint $table) {
            //
            $table->dropColumn('emergency_title');
        });
    }
}

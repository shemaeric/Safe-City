<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmergencyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emergency_table', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('help_center_id');
            $table->foreign('help_center_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->string('help_seeker_id');
            $table->foreign('help_seeker_id')
                ->references('id')
                ->on('help_seekers')
                ->onDelete('cascade');
            $table->string('emergency_category');
            $table->string('attached_file')->nullable();
            $table->string('description_of_attached_file')->nullable();
            $table->string('longitude');
            $table->string('latitude');
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
        Schema::dropIfExists('emergency_table');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBloodIdToEmergencyRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('emergency_requests', function (Blueprint $table) {
            $table->unsignedBigInteger('blood_id')->after('blood_group')->nullable();
            $table->foreign('blood_id')->references('id')->on('bloods');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('emergency_requests', function (Blueprint $table) {
            $table->dropColumn('blood_id');
        });
    }
}

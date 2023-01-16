<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('committees', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('committee_first_name')->nullable();
            $table->string('committee_last_name')->nullable();
            $table->string('committee_email');
            $table->string('committee_mobile_no');
            $table->string('committee_address')->nullable();
            $table->string('committee_city')->nullable();
            $table->string('committee_state')->nullable();
            $table->string('committee_zipcode')->nullable();
            $table->string('committee_country')->nullable();
            $table->string('committee_course')->nullable();
            $table->string('committee_year')->nullable();
            $table->string('committee_semester')->nullable();
            $table->string('committee_picture')->nullable();
            $table->string('committee_picture_size')->nullable();
            $table->string('committee_portfolio')->nullable();
            $table->string('committee_position')->nullable();
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
        Schema::dropIfExists('committees');
    }
};

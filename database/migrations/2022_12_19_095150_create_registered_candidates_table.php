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
        Schema::create('registered_candidates', function (Blueprint $table) {
            $table->id();
            $table->string('matricid')->unique();
            $table->string('name');
            $table->string('position');
            $table->string('major');
            $table->string('intake');
            $table->string('manifesto');
            $table->string('profilepicture')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registered_candidates');
    }
};

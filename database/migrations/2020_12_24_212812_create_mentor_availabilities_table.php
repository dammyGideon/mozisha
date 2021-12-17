<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMentorAvailabilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mentor_availabilities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mentor_id')->constrained('users');
            $table->foreignId('mentee_id')->constrained('users');
            $table->foreignId('connect_id')->constrained('connects');
            $table->string('from_hour');
            $table->string('from_minute');
            $table->string('from_meridian');
            $table->string('to_hour');
            $table->string('to_minute');
            $table->string('to_meridian');
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
        Schema::dropIfExists('mentor_availabilities');
    }
}

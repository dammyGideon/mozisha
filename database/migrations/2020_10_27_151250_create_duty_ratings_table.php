<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDutyRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('duty_ratings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mentor_id')->constrained('users'); //Rater
            $table->foreignId('mentee_id')->constrained('users'); // User who responded to a duty
            $table->foreignId('connect_id')->constrained('connects');
            $table->foreignId('response_id')->constrained('duty_responses');
            $table->string('rating'); // 5 = Excellent ,4 =Very Good, 3 = Good, 2 = Fair, 1 = Poor
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
        Schema::dropIfExists('duty_ratings');
    }
}

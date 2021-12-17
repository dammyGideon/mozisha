<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMentorRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mentor_ratings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mentor_id')->constrained('users'); //Ratee
            $table->foreignId('mentee_id')->constrained('users'); //Rater
            $table->foreignId('connect_id')->constrained('connects');
            $table->string('rating'); // 5 = Excellent ,4 =Very Good, 3 = Good, 2 = Fair, 1 = Poor
            $table->text('comment');
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
        Schema::dropIfExists('mentor_ratings');
    }
}

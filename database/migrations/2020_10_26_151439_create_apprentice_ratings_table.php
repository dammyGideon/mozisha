<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApprenticeRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apprentice_ratings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mentor_id')->constrained('users'); //Rater
            $table->foreignId('mentee_id')->constrained('users'); //Ratee
            $table->foreignId('connect_id')->constrained('connects');
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
        Schema::dropIfExists('apprentice_ratings');
    }
}

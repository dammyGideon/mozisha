<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMentorReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mentor_reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('apprentice_id')->constrained('users'); //the apprentice to be reviewed
            $table->foreignId('mentor_id')->constrained('users'); //the review writer
            $table->text('review');
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
        Schema::dropIfExists('mentor_reviews');
    }
}

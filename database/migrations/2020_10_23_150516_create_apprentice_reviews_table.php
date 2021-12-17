<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApprenticeReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apprentice_reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('apprentice_id')->constrained('users'); //the review writer
            $table->foreignId('mentor_id')->constrained('users'); //the mentor to be reviewed
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
        Schema::dropIfExists('apprentice_reviews');
    }
}

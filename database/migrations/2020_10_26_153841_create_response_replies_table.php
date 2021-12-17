<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResponseRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('response_replies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mentor_id')->constrained('users'); //Rater
            $table->foreignId('mentee_id')->constrained('users'); //Ratee
            $table->foreignId('connect_id')->constrained('connects');
            $table->foreignId('response_id')->constrained('duty_responses');
            $table->string('sender_id');
            $table->text('reply');
            $table->string('status')->default('Unseen'); //Seen or Unseen
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
        Schema::dropIfExists('response_replies');
    }
}

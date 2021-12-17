<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatConnectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_connects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('initiator_id')->constrained('users'); //Friendship initiator
            $table->string('initiator_role');
            $table->foreignId('partner_id')->constrained('users'); //The partners i.e the friendship receiver
            $table->string('partner_role');
            $table->string('status')->default('Pending'); //Pending, Active, Terminated, Rejected
            $table->string('req_status')->default('Unseen'); //Seen, Unseen
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
        Schema::dropIfExists('chat_connects');
    }
}

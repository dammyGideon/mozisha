<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_subscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('country');
            $table->string('city');
            $table->string('age_range');
            $table->string('email');
            $table->string('phone');
            $table->foreignId('event_id')->constrained('events');
            $table->text('details');
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
        Schema::dropIfExists('event_subscriptions');
    }
}

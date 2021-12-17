<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->text('theme');
            $table->text('slug');
            $table->text('details');
            $table->string('location');
            $table->string('organizer');
            $table->string('organizer_email');
            $table->string('organizer_phone');
            $table->string('start_minute');
            $table->string('start_hour');
            $table->string('start_meridian');
            $table->string('start_time_zone');
            $table->string('start_date');
            $table->string('start_time_stamp');
            $table->string('end_minute');
            $table->string('end_hour');
            $table->string('status')->default('Active');//could be suspended, active, canceled
            $table->string('end_meridian');
            $table->string('end_date');
            $table->string('platform')->default('Available soon')->nullable();
            $table->string('link', 1000)->default('Available soon')->nullable();
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
        Schema::dropIfExists('events');
    }
}

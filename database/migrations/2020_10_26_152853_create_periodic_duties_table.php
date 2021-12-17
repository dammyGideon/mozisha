<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeriodicDutiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('periodic_duties', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('details');
            $table->string('deadline');  // Daily, Weekly, Monthly
            $table->string('file')->nullable();
            $table->string('link_1')->nullable();
            $table->string('link_2')->nullable();
            $table->string('file_original_name')->nullable();
            $table->foreignId('mentor_id')->constrained('users');
            $table->foreignId('mentee_id')->constrained('users');
            $table->foreignId('connect_id')->constrained('connects');
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
        Schema::dropIfExists('periodic_duties');
    }
}

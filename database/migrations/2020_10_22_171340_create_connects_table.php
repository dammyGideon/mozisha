<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConnectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('connects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mentor_id')->constrained('users');
            $table->foreignId('mentee_id')->constrained('users');
            $table->foreignId('apprenticeship_id')->constrained('apprenticeships');
            $table->string('type'); //Premium or free
            $table->string('price')->nullable();
            $table->string('payment_status')->nullable(); //Pending and Paid
            $table->string('connect_id_string');
            $table->string('start_timestamp'); //The date the montor uploaded in the apprenticeship tale
            $table->string('end_timestamp'); //The date the montor uploaded in the apprenticeship tale
            $table->string('apprentice_period');
            $table->string('mentor_period');
            $table->string('apprentice_service')->nullable(); // service to be rendered
            $table->string('status')->default('Active'); //Active, Completed, Pending, Suspended or Terminated.
            $table->string('rating')->nullable(); // Excellent(5), good(4), fair(3), bad(2), or poor(1).
            $table->string('reason')->nullable(); // Reason for changing the status.
            $table->string('mentor_comment')->nullable(); // Comment on the apprenticeship by the mentor.
            $table->string('apprentice_comment')->nullable(); // Comment on the apprenticeship by the apprentice.
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
        Schema::dropIfExists('connects');
    }
}

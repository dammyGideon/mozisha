<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApprenticeshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apprenticeships', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('details');
            $table->string('company');
            $table->string('start_date');
            $table->string('start_timestamp');
            $table->string('end_date');
            $table->string('end_timestamp');
            $table->string('apprentice_period');
            $table->string('mentor_period');
            $table->string('apprentice_service'); // service to be rendered
            $table->string('mentor_name');
            $table->string('type'); // Premium or Free
            $table->string('price')->nullable();
            $table->text('how');
            $table->text('requirement');
            $table->text('motivation');
            $table->integer('experience'); // In numbers
            $table->string('status')->nullable()->default('Active'); //Active, Suspended.
            $table->foreignId('user_id')->constrained('users');
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
        Schema::dropIfExists('apprenticeships');
    }
}

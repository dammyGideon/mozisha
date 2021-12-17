<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApprenticeshipStatusChangeRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apprenticeship_status_change_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('connect_id')->constrained('connects');
            $table->string('reason');
            $table->string('status');
            $table->text('details');
            $table->string('seen')->default('No'); //Yes of No
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
        Schema::dropIfExists('apprenticeship_status_change_requests');
    }
}

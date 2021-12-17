<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mentee_id')->constrained('users');
            $table->foreignId('mentor_id')->constrained('users');
            $table->foreignId('connect_id')->constrained('connects');
            $table->foreignId('apprenticeship_id')->constrained('apprenticeships');
            $table->string('invoice_no');
            $table->integer('card_number');
            $table->integer('amount');
            $table->string('status')->default('Pending'); //Pending, Successful, Failed
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
        Schema::dropIfExists('invoices');
    }
}

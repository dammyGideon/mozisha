<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('website');
            $table->string('company');
            $table->string('domain');
            $table->string('email');
            $table->string('phone');
            $table->text('address');
            $table->string('alert_email');
            $table->string('alert_email_pass');
            $table->string('slogan');
            $table->string('country');
            $table->string('state');
            $table->text('about');
            $table->string('logo');
            $table->string('favicon');
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
        Schema::dropIfExists('settings');
    }
}

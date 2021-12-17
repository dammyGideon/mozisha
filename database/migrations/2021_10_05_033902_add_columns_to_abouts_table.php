<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('abouts', function (Blueprint $table) {
            $table->string('preferred_skill')->nullable();
            $table->string('less_preferred_skill')->nullable();
            $table->string('expertise_in_preferred_skill')->nullable();
            $table->string('expertise_in_less_preferred_skill')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('abouts', function (Blueprint $table) {
            $table->dropColumn('preferred_skill');
            $table->dropColumn('less_preferred_skill');
            $table->dropColumn('expertise_in_preferred_skill');
            $table->dropColumn('expertise_in_less_preferred_skill');
        });
    }
}

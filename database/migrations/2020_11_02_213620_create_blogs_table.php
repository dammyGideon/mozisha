<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('slug');
            $table->string('image');
            $table->string('caption')->nullable();
            $table->string('category');
            $table->text('content');
            $table->text('continue_1')->nullable();
            $table->string('continue_image_1')->nullable();
            $table->string('caption_1')->nullable();
            $table->text('continue_2')->nullable();
            $table->string('continue_image_2')->nullable();
            $table->string('caption_2')->nullable();
            $table->text('continue_3')->nullable();
            $table->string('continue_image_3')->nullable();
            $table->string('caption_3')->nullable();
            $table->text('continue_4')->nullable();
            $table->string('continue_image_4')->nullable();
            $table->string('caption_4')->nullable();
            $table->text('continue_5')->nullable();
            $table->string('continue_image_5')->nullable();
            $table->string('caption_5')->nullable();
            $table->text('continue_6')->nullable();
            $table->string('continue_image_6')->nullable();
            $table->string('caption_6')->nullable();
            $table->text('continue_7')->nullable();
            $table->string('continue_image_7')->nullable();
            $table->string('caption_7')->nullable();
            $table->text('continue_8')->nullable();
            $table->string('continue_image_8')->nullable();
            $table->string('caption_8')->nullable();
            $table->text('continue_9')->nullable();
            $table->string('continue_image_9')->nullable();
            $table->string('caption_9')->nullable();
            $table->text('quote')->nullable();
            $table->integer('view')->default(0);
            $table->string('quote_by')->nullable();
            $table->string('status');
            $table->foreignId('user_id')->constrained('users');
//            $table->string('user_role'); later
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
        Schema::dropIfExists('blogs');
    }
}

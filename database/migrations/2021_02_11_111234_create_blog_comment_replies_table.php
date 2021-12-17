<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogCommentRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_comment_replies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('comment_id')->constrained('blog_comments');
            $table->string('name');
            $table->string('email');
            $table->text('website')->nullable();
            $table->text('message');
            $table->string('status')->default('Active'); //Could be Blocked also
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
        Schema::dropIfExists('blog_comment_replies');
    }
}

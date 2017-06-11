<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('avatar')->comment('头像');
            $table->string('confirmation_token');
            $table->smallInteger('is_active')->default(0)->comment('是否激活');
            $table->integer('questions_count')->default(0)->comment('提问数');
            $table->integer('answers_count')->default(0)->comment('回答数');
            $table->integer('comments_count')->default(0)->comment('评论数');
            $table->integer('favourites_count')->default(0)->comment('收藏数');
            $table->integer('likes_count')->default(0)->comment('点赞数');
            $table->integer('followers_count')->default(0)->comment('关注者');
            $table->integer('followings_count')->default(0)->comment('粉丝数');
            $table->json('settings')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}

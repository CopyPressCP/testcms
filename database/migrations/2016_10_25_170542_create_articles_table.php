<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('article_id');
            $table->integer('create_role_id');
            $table->string('creation_user_id');
            $table->integer('status');
            $table->string('title');
            $table->string('author');
            $table->string('body')->nullable();
            $table->string('raw_body');
            $table->integer('word_count');
            $table->decimal('total_cost', 10, 2);
            $table->tinyInteger('rating');
            $table->text('comment');
            $table->tinyInteger('wp_ready_yn');
            $table->date('approval_date');
            $table->date('client_approval_date');
            $table->date('start_date');
            $table->date('due_date');
            $table->date('wp-download_date');
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
        Schema::drop('articles');
    }
}

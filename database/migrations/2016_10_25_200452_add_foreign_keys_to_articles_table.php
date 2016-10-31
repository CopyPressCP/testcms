<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->integer('campaign_id')->after('article_id')->unsigned();
            $table->foreign('campaign_id')->references('campaign_id')->on('campaigns');

            $table->integer('domain_id')->after('campaign_id')->unsigned();
            $table->foreign('domain_id')->references('domain_id')->on('domains');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('articles', function (Blueprint $table) {
            //
        });
    }
}

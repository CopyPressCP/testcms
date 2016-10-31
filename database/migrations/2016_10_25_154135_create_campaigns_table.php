<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->increments('campaign_id');
            $table->string('name')->nullable();
            $table->string('default_article_type')->nullable();
            $table->date('assigned_date');
            $table->date('start_date');
            $table->date('due_date');
            $table->integer('word_count');
            $table->string('style_guide_url')->nullable();
            $table->integer('create_role_id');
            $table->string('creation_user_id');
            $table->decimal('amount', 5, 2);
            $table->decimal('campaign_cost_structure', 4, 2);
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
        Schema::drop('campaigns');
    }
}

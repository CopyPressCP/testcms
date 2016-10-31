<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCmsFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('id', 'user_id');
            $table->renameColumn('name', 'first_name');
            $table->string('last_name',255)->nullable();
            $table->string('address',255)->nullable();
            $table->string('city',255)->nullable();
            $table->string('state',255)->nullable();
            $table->string('zip',255)->nullable();
            $table->string('phone_1',255)->nullable();
            $table->string('phone_2',255)->nullable();
            $table->string('sex',255)->nullable();
            $table->binary('image')->nullable();
            $table->date('dob');
            $table->dateTime('join_date');
            $table->tinyInteger('pm_yn');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
            //
        });
    }
}

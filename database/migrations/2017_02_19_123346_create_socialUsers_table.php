<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocialUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('socialUsers', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('platform');
            $table->integer('social_uid');
            $table->string('nick_name');
            $table->string('email');
            $table->string('user_url');
            $table->string('pic_url');
            $table->integer('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('socialUsers');
    }
}

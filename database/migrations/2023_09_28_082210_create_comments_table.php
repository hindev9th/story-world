<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('story_id')->unsigned();
            $table->unsignedBigInteger('episode_id')->unsigned();
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->string('content');
            $table->timestamps();
            $table->softDeletes();

            $table->index('story_id');
            $table->index('episode_id');
            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
};

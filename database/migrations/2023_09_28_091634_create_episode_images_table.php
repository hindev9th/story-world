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
        Schema::create('episode_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('episode_id')->unsigned();
            $table->text('image');
            $table->timestamps();
            $table->softDeletes();

            $table->index('episode_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('episode_images');
    }
};

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
        Schema::create('actors_films', function (Blueprint $table) {
            $table->integer('actor_id');
            $table->integer('film_id');
            $table->index('actor_id');
            $table->index('film_id');
            $table->foreign('actor_id')->references('id')->on('actors')->onDelete('cascade');
            $table->foreign('film_id')->references('id')->on('films')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actors_films');
    }
};

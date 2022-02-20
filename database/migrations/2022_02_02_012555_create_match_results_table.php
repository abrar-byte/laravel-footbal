<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('match_results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('schedule_id');

            // $table->unsignedBigInteger('home_team_id');
            // $table->foreign('home_team_id')->references('id')->on('teams');
            // $table->unsignedBigInteger('away_team_id');
            // $table->foreign('away_team_id')->references('id')->on('teams');

            // $table->foreignId("score_id");

            // $table->integer('home_team_skor');
            // $table->integer('away_team_skor');

            // $table->json('home_team_goal')->nullable();
            // $table->json('away_team_goal')->nullable();

            // $table->json('home_team_minute')->nullable();
            // $table->json('away_team_minute')->nullable();



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
        Schema::dropIfExists('match_results');
    }
}

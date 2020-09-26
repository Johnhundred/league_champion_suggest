<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSummonerProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('summoner_profiles', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('riot_id', 100)->unique();
            $table->string('account_id', 100)->unique();
            $table->string('puuid', 100)->unique();
            $table->string('name', 100);
            $table->string('region', 5);
            $table->integer('profile_icon_id');
            $table->integer('revision_date');
            $table->integer('summoner_level');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('summoner_profiles');
    }
}

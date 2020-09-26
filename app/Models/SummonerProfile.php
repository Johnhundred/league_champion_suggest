<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SummonerProfile extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'riot_id',
        'account_id',
        'puuid',
        'name',
        'profile_icon_id',
        'revision_date',
        'summoner_level',
    ];
}

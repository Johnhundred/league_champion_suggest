<?php

namespace App\Providers;

use App\Domains\Intake\Client;
use App\Domains\Intake\Interfaces\RiotAPIClientInterface;
use App\Domains\Intake\Interfaces\SummonerRepositoryInterface;
use App\Domains\Intake\Interfaces\MatchRepositoryInterface;
use App\Domains\Intake\Repositories\MatchRepository;
use App\Domains\Intake\Repositories\SummonerRepository;
use Illuminate\Support\ServiceProvider;

class IntakeServiceProvider extends ServiceProvider
{
    /**
     * Bind the interface to an implementation repository class
     */
    public function register()
    {
        $this->app->bind(RiotAPIClientInterface::class, Client::class);
        $this->app->bind(SummonerRepositoryInterface::class, SummonerRepository::class);
        $this->app->bind(MatchRepositoryInterface::class, MatchRepository::class);
    }
}
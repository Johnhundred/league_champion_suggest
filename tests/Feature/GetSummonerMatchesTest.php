<?php

namespace Tests\Feature;

use App\Domains\Intake\Client;
use App\Domains\Intake\Data\MatchOverview;
use App\Domains\Intake\Data\MatchOverviews;
use App\Domains\Intake\Data\SummonerProfile;
use App\Domains\Intake\Interfaces\RiotAPIClientInterface;
use App\Domains\Intake\Interfaces\MatchRepositoryInterface;
use App\Domains\Intake\Jobs\GetSummonerMatches;
use App\Domains\Intake\Options\GetSummonerMatchesOptions;
use App\Domains\Intake\Repositories\MatchRepository;
use App\Domains\Intake\Requests\GetSummonerMatchesRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mockery;
use Tests\TestCase;

class GetSummonerMatchesTest extends TestCase
{
    public function testGetSummonerMatches()
    {
        $profile = new SummonerProfile('abc', 'def', 'ghi', 'Razorleaf', 'euw1', 1, time(), 40);
        $mockedMatchOverview = Mockery::mock(MatchOverview::class);
        $mockedMatchOverview->platform = 'euw1';
        $mockedMatchOverview->gameId = 1;
        $mockedMatchOverview->queue = 450;
        $mockedMatchOverview->season = 12;
        $mockedMatchOverview->timestamp = time();
        $mockedMatchOverviews = Mockery::mock(MatchOverviews::class);
        $mockedMatchOverviews->data = collect([$mockedMatchOverview]);
        // Mock API client to not make a real request
        $this->instance(RiotAPIClientInterface::class, Mockery::mock(Client::class, function ($mock) use ($mockedMatchOverviews) {
            $mock->shouldReceive('getSummonerMatches')->once()->with(GetSummonerMatchesRequest::class)->andReturn($mockedMatchOverviews);
        }));
        // Mock repository to not need a database connection
        $this->instance(MatchRepositoryInterface::class, Mockery::mock(MatchRepository::class, function ($mock) use ($mockedMatchOverview) {
            $mock->shouldReceive('saveOverview')->once()->with($mockedMatchOverview);
        }));

        $job = new GetSummonerMatches(new GetSummonerMatchesOptions($profile));
        $job->handle();
    }
}

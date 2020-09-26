<?php

namespace Tests\Feature;

use App\Domains\Intake\Client;
use App\Domains\Intake\Data\SummonerProfile;
use App\Domains\Intake\Interfaces\RiotAPIClientInterface;
use App\Domains\Intake\Interfaces\SummonerRepositoryInterface;
use App\Domains\Intake\Jobs\GetSummonerProfileByName;
use App\Domains\Intake\Options\GetSummonerProfileByNameOptions;
use App\Domains\Intake\Repositories\SummonerRepository;
use App\Domains\Intake\Requests\GetSummonerProfileRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mockery;
use Tests\TestCase;

class GetSummonerProfileTest extends TestCase
{
    public function testGetSummonerProfileByName()
    {
        $profile = new SummonerProfile('abc', 'def', 'ghi', 'Razorleaf', 'euw1', 1, time(), 40);
        // Mock API client to not make a real request
        $this->instance(RiotAPIClientInterface::class, Mockery::mock(Client::class, function ($mock) use ($profile) {
            $mock->shouldReceive('getSummonerProfile')->once()->with(GetSummonerProfileRequest::class)->andReturn($profile);
        }));
        // Mock repository to not need a database connection
        $this->instance(SummonerRepositoryInterface::class, Mockery::mock(SummonerRepository::class, function ($mock) use ($profile) {
            $mock->shouldReceive('saveProfile')->once()->with($profile);
        }));

        $job = new GetSummonerProfileByName(new GetSummonerProfileByNameOptions('Razorleaf', 'euw'));
        $job->handle();
    }
}

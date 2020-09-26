<?php

namespace App\Domains\Intake\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Domains\Intake\Options\GetSummonerProfileByNameOptions;
use App\Domains\Intake\Interfaces\RiotAPIClientInterface;
use App\Domains\Intake\Interfaces\SummonerRepositoryInterface;
use App\Domains\Intake\Requests\GetSummonerByNameRequest;

class GetSummonerProfileByName implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $options;
    private $client;
    private $summonerRepository;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(GetSummonerProfileByNameOptions $options)
    {
        $this->options = $options;
        $this->client = resolve(RiotAPIClientInterface::class);
        $this->summonerRepository = resolve(SummonerRepositoryInterface::class);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $profile = $this->client->getSummonerProfile(new GetSummonerByNameRequest($this->options));
        $this->summonerRepository->saveProfile($profile);
    }
}

<?php

namespace App\Domains\Intake\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Domains\Intake\Options\GetSummonerMatchesOptions;
use App\Domains\Intake\Interfaces\RiotAPIClientInterface;
use App\Domains\Intake\Interfaces\MatchRepositoryInterface;
use App\Domains\Intake\Requests\GetSummonerMatchesRequest;

class GetSummonerMatches implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $options;
    private $client;
    private $matchRepository;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(GetSummonerMatchesOptions $options)
    {
        $this->options = $options;
        $this->client = resolve(RiotAPIClientInterface::class);
        $this->matchRepository = resolve(MatchRepositoryInterface::class);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $matchOverviews = $this->client->getSummonerMatches(new GetSummonerMatchesRequest($this->options));
        foreach ($matchOverviews->data as $overview) {
            $this->matchRepository->saveOverview($overview);
        }
    }
}

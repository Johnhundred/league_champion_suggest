<?php

namespace App\Console\Commands;

use App\Domains\Intake\Data\SummonerProfile;
use App\Domains\Intake\Jobs\GetSummonerMatches;
use App\Domains\Intake\Jobs\GetSummonerProfileByName;
use App\Domains\Intake\Options\GetSummonerMatchesOptions;
use App\Domains\Intake\Options\GetSummonerProfileByNameOptions;
use App\Models\SummonerProfile as SummonerProfileModel;
use App\Models\Match as MatchModel;
use Illuminate\Console\Command;

class Test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        
    }
}

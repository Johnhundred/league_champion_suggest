<?php

namespace App\Domains\Intake\Interfaces;

use App\Domains\Intake\Data\MatchOverviews;
use App\Domains\Intake\Data\SummonerProfile;
use App\Domains\Intake\Requests\GetSummonerMatchesRequest;
use App\Domains\Intake\Requests\GetSummonerProfileRequest;

interface RiotAPIClientInterface
{
    public function getSummonerProfile(GetSummonerProfileRequest $request): SummonerProfile;

	public function getSummonerMatches(GetSummonerMatchesRequest $request): MatchOverviews;
}

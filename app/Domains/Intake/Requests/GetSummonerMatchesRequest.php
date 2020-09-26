<?php

namespace App\Domains\Intake\Requests;

use App\Domains\Intake\Utilities;
use App\Domains\Intake\Data\SummonerProfile;
use App\Domains\Intake\Options\GetSummonerMatchesOptions;

class GetSummonerMatchesRequest extends GetSummonerProfileRequest
{
    private const BASE_URL = '/lol/match/v4/matchlists/by-account/';
    public SummonerProfile $profile;
    public int $endIndex;

    public function __construct(GetSummonerMatchesOptions $options)
    {
    	$this->region = $options->region;
    	$this->endIndex = $options->count;
    	$this->profile = $options->profile;
        $this->url = Utilities::getBaseAPIUrlWithRegion($options->region).self::BASE_URL.$options->profile->accountId;
    }
}

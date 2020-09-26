<?php

namespace App\Domains\Intake\Requests;

use App\Domains\Intake\Utilities;
use App\Domains\Intake\Options\GetSummonerProfileByNameOptions;

class GetSummonerByNameRequest extends GetSummonerProfileRequest
{
    private const BASE_URL = '/lol/summoner/v4/summoners/by-name/';

    public function __construct(GetSummonerProfileByNameOptions $options)
    {
    	$this->region = $options->region;
        $this->url = Utilities::getBaseAPIUrlWithRegion($options->region).self::BASE_URL.$options->name;
    }
}

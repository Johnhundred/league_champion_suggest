<?php

namespace App\Domains\Intake\Options;

use App\Domains\Intake\Data\SummonerProfile;

class GetSummonerMatchesOptions
{
    public SummonerProfile $profile;
    public int $count;
    public string $region;

    public function __construct(SummonerProfile $profile, ?int $count = 100)
    {
        $this->profile = $profile;
        $this->count = $count;
        $this->region = $profile->region;
    }
}

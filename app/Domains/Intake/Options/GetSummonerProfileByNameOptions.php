<?php

namespace App\Domains\Intake\Options;

use App\Domains\Intake\Utilities;

class GetSummonerProfileByNameOptions
{
    public string $name;
    public string $region;

    public function __construct(string $name, string $region)
    {
        $this->name = $name;
        $this->region = Utilities::getValidAPIRegion($region);
    }
}

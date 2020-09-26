<?php

namespace App\Domains\Intake\Interfaces;

use App\Domains\Intake\Data\SummonerProfile;

interface SummonerRepositoryInterface
{
	public function saveProfile(SummonerProfile $profile): void;
}

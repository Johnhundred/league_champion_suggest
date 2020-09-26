<?php

namespace App\Domains\Intake\Interfaces;

use App\Domains\Intake\Data\MatchOverview;

interface MatchRepositoryInterface
{
	public function saveOverview(MatchOverview $overview): void;
}

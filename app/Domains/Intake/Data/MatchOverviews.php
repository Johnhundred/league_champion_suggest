<?php

namespace App\Domains\Intake\Data;

use App\Domains\Intake\Data\MatchOverview;
use App\Domains\Intake\Data\SummonerProfile;
use Illuminate\Support\Collection;

class MatchOverviews
{
	public Collection $data;

	public function __construct(Collection $matchOverviews)
	{
		$this->data = $matchOverviews;
		$this->validate();
	}

	public static function fromJson(SummonerProfile $profile, object $json): self
	{
		$overviews = collect();
		foreach ($json->matches as $match) {
			$overviews->push(MatchOverview::fromJson($match));
		}
		return new self($overviews);
	}

	private function validate(): void
	{
		foreach ($this->data as $overview) {
			if (!$overview instanceof MatchOverview) {
				throw new \Exception('MatchOverviews must be a collection of \App\Domains\Intake\Data\MatchOverview', 1);
			}
		}
	}
}

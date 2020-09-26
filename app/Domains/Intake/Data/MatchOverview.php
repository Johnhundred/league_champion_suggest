<?php

namespace App\Domains\Intake\Data;

use App\Domains\Intake\Data\MatchOverviews;
use App\Domains\Intake\Data\SummonerProfile;
use Illuminate\Support\Collection;

class MatchOverview
{
	public string $platform;
	public int $gameId;
	public int $queue;
	public int $season;
	public int $timestamp;

	public function __construct(string $platform, int $gameId, int $queue, int $season, int $timestamp)
	{
		$this->platform = $platform;
		$this->gameId = $gameId;
		$this->queue = $queue;
		$this->season = $season;
		$this->timestamp = $timestamp;
	}

	public static function fromJson(object $json): self
	{
		return new self($json->platformId, $json->gameId, $json->queue, $json->season, $json->timestamp);
	}
}

<?php

namespace App\Domains\Intake\Data;

use App\Models\SummonerProfile as Model;

class SummonerProfile
{
	public string $id;
	public string $accountId;
	public string $puuid;
	public string $name;
	public string $region;
	public int $profileIconId;
	public int $revisionDate;
	public int $summonerLevel;

	public function __construct(string $id, string $accountId, string $puuid, string $name, string $region, int $profileIconId, int $revisionDate, int $summonerLevel)
	{
		$this->id = $id;
		$this->accountId = $accountId;
		$this->puuid = $puuid;
		$this->name = $name;
		$this->region = $region;
		$this->profileIconId = $profileIconId;
		$this->revisionDate = $revisionDate;
		$this->summonerLevel = $summonerLevel;
	}

	public static function fromJson(string $region, object $json): self
	{
		return new self($json->id, $json->accountId, $json->puuid, $json->name, $region, $json->profileIconId, $json->revisionDate, $json->summonerLevel);
	}

	public static function fromModel(Model $model): self
	{
		return new self($model->riot_id, $model->account_id, $model->puuid, $model->name, $model->region, $model->profile_icon_id, $model->revision_date, $model->summoner_level);
	}
}

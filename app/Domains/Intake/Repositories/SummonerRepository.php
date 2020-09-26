<?php

namespace App\Domains\Intake\Repositories;

use App\Domains\Intake\Data\SummonerProfile;
use App\Domains\Intake\Interfaces\SummonerRepositoryInterface;
use App\Models\SummonerProfile as Model;

class SummonerRepository
{
	public function saveProfile(SummonerProfile $profile): void
	{
		$summonerProfileModel = Model::where('riot_id', $profile->id)->first();
		if (!$summonerProfileModel) {
			$summonerProfileModel = new Model();
		}

		$summonerProfileModel->riot_id = $profile->id;
		$summonerProfileModel->account_id = $profile->accountId;
		$summonerProfileModel->puuid = $profile->puuid;
		$summonerProfileModel->name = $profile->name;
		$summonerProfileModel->region = $profile->region;
		$summonerProfileModel->profile_icon_id = $profile->profileIconId;
		$summonerProfileModel->revision_date = $profile->revisionDate;
		$summonerProfileModel->summoner_level = $profile->summonerLevel;
		$summonerProfileModel->save();
	}
}

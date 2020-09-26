<?php

namespace App\Domains\Intake\Repositories;

use App\Domains\Intake\Data\MatchOverview;
use App\Domains\Intake\Interfaces\SummonerRepositoryInterface;
use App\Models\Match as Model;

class MatchRepository
{
	public function saveOverview(MatchOverview $overview): void
	{
		$matchModel = Model::where('game_id', $overview->gameId)->first();
		if (!$matchModel) {
			$matchModel = new Model();
		}

		$matchModel->platform = $overview->platform;
		$matchModel->game_id = $overview->gameId;
		$matchModel->queue = $overview->queue;
		$matchModel->season = $overview->season;
		$matchModel->timestamp = $overview->timestamp;
		$matchModel->save();
	}
}

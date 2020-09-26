<?php

namespace App\Domains\Intake;

use App\Domains\Intake\Data\MatchOverviews;
use App\Domains\Intake\Data\SummonerProfile;
use App\Domains\Intake\Interfaces\RiotAPIClientInterface;
use App\Domains\Intake\Requests\GetSummonerMatchesRequest;
use App\Domains\Intake\Requests\GetSummonerProfileRequest;
use GuzzleHttp\Client as GuzzleClient;

class Client implements RiotAPIClientInterface
{
	public function __construct()
	{
		$this->client = new GuzzleClient(['headers' => ['X-Riot-Token' => config('league.api_key')]]);
	}

	public function getSummonerProfile(GetSummonerProfileRequest $request): SummonerProfile
	{
		$response = $this->client->request($request->getMethod(), $request->getUrl());
		return SummonerProfile::fromJson($request->region, json_decode((string) $response->getBody()));
	}

	public function getSummonerMatches(GetSummonerMatchesRequest $request): MatchOverviews
	{
		$response = $this->client->request($request->getMethod(), $request->getUrl(), ['query' => ['endIndex' => $request->endIndex]]);
		return MatchOverviews::fromJson($request->profile, json_decode((string) $response->getBody()));
	}
}

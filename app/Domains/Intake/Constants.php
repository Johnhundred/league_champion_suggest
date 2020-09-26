<?php

namespace App\Domains\Intake;

use App\Domains\Intake\Utilities;

class Constants
{
	public const API_PROTOCOL = 'https://';
	public const API_BASE_URL = '.api.riotgames.com';
	public const API_REGIONS = [
		'br1',
		'eun1',
		'euw1',
		'jp1',
		'kr',
		'la1',
		'la2',
		'na1',
		'oc1',
		'tr1',
		'ru',
	];
	public const API_REGION_MAPPING = [
		'br' => 'br1',
		'eun' => 'eun1',
		'euw' => 'euw1',
		'jp' => 'jp1',
		'kr' => 'kr',
		'la1' => 'la1',
		'la2' => 'la2',
		'na' => 'na1',
		'oc' => 'oc1',
		'tr' => 'tr1',
		'ru' => 'ru',
	];
}

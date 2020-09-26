<?php

namespace App\Domains\Intake;

use App\Domains\Intake\Constants;

class Utilities
{
	public static function getBaseAPIUrlWithRegion(string $region): string
	{
		return Constants::API_PROTOCOL.$region.Constants::API_BASE_URL;
	}

	public static function getValidAPIRegion(string $region): string
	{
		$lowercasedRegion = strtolower($region);
		$apiRegion = $lowercasedRegion;

		if (array_key_exists($lowercasedRegion, Constants::API_REGION_MAPPING)) {
			$apiRegion = Constants::API_REGION_MAPPING[$lowercasedRegion];
		}

		if (in_array($apiRegion, Constants::API_REGIONS)) {
			return $apiRegion;
		}

		throw new \Exception("Could not resolve a valid API region", 1);		
	}
}

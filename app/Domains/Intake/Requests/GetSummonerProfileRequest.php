<?php

namespace App\Domains\Intake\Requests;

class GetSummonerProfileRequest
{
    protected const METHOD = 'GET';
    protected string $url;
    public string $region;

    public function getMethod(): string
    {
        return static::METHOD;
    }

    public function getUrl(): string
    {
        return $this->url;
    }
}

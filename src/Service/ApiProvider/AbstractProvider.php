<?php
namespace App\Service\ApiProvider;

abstract class AbstractProvider
{
    private $apiBaseUrl;

    protected function setApiBaseUrl(string $url) : void
    {
        $this->apiBaseUrl = $url;
    }

    abstract public function query(string $q) : string;

    protected function download(string $q) : string
    {
        $client = new \GuzzleHttp\Client();

        $res = $client->request('GET', $this->apiBaseUrl . $q);

        return $res->getStatusCode() === 200 ? $res->getBody() : false;
    }
}
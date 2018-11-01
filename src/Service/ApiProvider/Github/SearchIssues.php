<?php
namespace App\Service\ApiProvider\Github;

class SearchIssues extends GithubProvider
{
    protected static $partialUrl = '/search/issues';

    public function query(string $q) : array
    {
        $rawData = $this->download(self::$partialUrl . '?q=' . $q);

        if ($rawData !== false) {
            return \GuzzleHttp\json_decode($rawData, true);

        } else {
            throw new \Exception('Something went wrong');
        }
    }


    public function queryUndabot(string $q) : array
    {
        $json = $this->query($q);

        if (isset($json['total_count'])) {
            $positive = $this->query($q . ' rocks');
            $negative = $this->query($q . ' sucks');

            if (isset($positive['total_count'], $negative['total_count']))
                return [
                    'all' => $json['total_count'],
                    'minus' => $negative['total_count'],
                    'plus' => $positive['total_count'],
                ];

        }

        throw new \Exception('API has been changed, please upgrade me');

    }
}
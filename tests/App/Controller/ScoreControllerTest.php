<?php

namespace App\Tests\Controller;

use App\Controller\ScoreController;
use PHPUnit\Framework\TestCase;

class ScoreTest extends TestCase
{
    public function testIndex()
    {
        $client = new \GuzzleHttp\Client();

        $res = $client->request('GET', 'http://undabot.test/score/undab000t');
        $finishedData = json_decode($res->getBody(true), true);

        $this->assertEquals(200, $res->getStatusCode());
        $this->assertArrayHasKey('term', $finishedData);
        $this->assertArrayHasKey('score', $finishedData);
    }
}
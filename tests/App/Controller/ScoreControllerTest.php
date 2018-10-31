<?php

namespace App\Tests\Controller;

use App\Controller\ScoreController;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    public function testAdd()
    {
        $calculator = new ScoreController('php');

        $this->assertEquals(42, $calculator);
    }
}
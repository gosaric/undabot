<?php
namespace App\Service\ApiProvider\Github;

use App\Service\ApiProvider\AbstractProvider;

abstract class GithubProvider extends AbstractProvider
{
    public function __construct()
    {
        $this->setApiBaseUrl('https://api.github.com');
    }
}
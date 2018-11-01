<?php

namespace App\Controller\Api\v1;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Keyword;
use App\Service\ApiProvider\Provider;

class BaseController extends AbstractController
{
    /**
     * @Route("welcome", name="welcome")
     */
    public function index() : object
    {
        return $this->json('Verzioniranje API-a');
    }
}
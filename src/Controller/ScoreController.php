<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Keyword;
use App\Service\ApiProvider\Provider;

class ScoreController extends AbstractController
{
    /**
     * @Route("/score/{term}", name="score")
     */
    public function index(string $term) : object
    {
        list($provider, $providerId) = Provider::get('github');

        $data = $this->getDoctrine()
            ->getRepository(Keyword::class)
            ->findOneBy(['name' => $term, 'provider' => $providerId]);

        if (!$data) {
            $data = $provider->queryUndabot($term);

            $new = new Keyword();
            $new->setName($term);
            $new->setCountAll($data['all']);
            $new->setCountMinus($data['minus']);
            $new->setCountPlus($data['plus']);
            $new->setCreated(time());
            $new->setProvider($providerId);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($new);
            $entityManager->flush();

            $data = $new;
        }

        try {
            $score = ($data->getCountPlus() / $data->getCountAll()) * 10;
        } catch (\Exception $e) {
            $score = 0;
        }

        return $this->json([
            'term' => $term,
            'score' => $score,
        ]);
    }
}

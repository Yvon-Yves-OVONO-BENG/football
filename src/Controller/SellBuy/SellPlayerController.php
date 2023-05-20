<?php

namespace App\Controller\SellBuy;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @IsGranted("ROLE_USER", message="Accès refusé. Espace reservé uniquement aux abonnés")
 *
 */
class SellPlayerController extends AbstractController
{
    #[Route('/sell/player', name: 'app_sell_player')]
    public function index(): Response
    {
        return $this->render('sell_player/index.html.twig', [
            'controller_name' => 'SellPlayerController',
        ]);
    }
}

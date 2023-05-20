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
class CancelSellPlayerController extends AbstractController
{
    #[Route('/cancel/sell/player', name: 'app_cancel_sell_player')]
    public function index(): Response
    {
        return $this->render('cancel_sell_player/index.html.twig', [
            'controller_name' => 'CancelSellPlayerController',
        ]);
    }
}

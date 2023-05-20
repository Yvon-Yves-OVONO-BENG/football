<?php

namespace App\Controller\SellBuy;

use App\Repository\SellBuyRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @IsGranted("ROLE_USER", message="Accès refusé. Espace reservé uniquement aux abonnés")
 *
 */
#[Route('/sell-Buy')]
class DisplaySaleBuyController extends AbstractController
{
    public function __construct(protected SellBuyRepository $sellBuyRepository, )
    {}

    #[Route('/display-sale-buy', name: 'display_sale_buy')]
    public function displaySaleBuy(): Response
    {
        $sellBuys = $this->sellBuyRepository->findAll();
        
        return $this->render('player/displaySaleBuy.html.twig', [
            'sellBuys' => $sellBuys
        ]);
    }
}

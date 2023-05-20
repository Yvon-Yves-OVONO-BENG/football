<?php

namespace App\Controller\SellBuy;

use App\Repository\ForSaleRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @IsGranted("ROLE_USER", message="Accès refusé. Espace reservé uniquement aux abonnés")
 *
 */
#[Route('/sell-Buy')]
class DisplayForSaleController extends AbstractController
{
    public function __construct(protected ForSaleRepository $forSaleRepository, )
    {}

    #[Route('/display-for-sale', name: 'display_for_sale')]
    public function displayForSale(): Response
    {
        $forSales = $this->forSaleRepository->findAll();

        return $this->render('player/displayForSale.html.twig', [
            'forSales' => $forSales
        ]);
    }
}

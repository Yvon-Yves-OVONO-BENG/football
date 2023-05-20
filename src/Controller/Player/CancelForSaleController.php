<?php

namespace App\Controller\Player;

use App\Entity\ForSale;
use App\Repository\ForSaleRepository;
use App\Repository\PlayerRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @IsGranted("ROLE_USER", message="Accès refusé. Espace reservé uniquement aux abonnés")
 *
 */
#[Route('/player')]
class CancelForSaleController extends AbstractController
{
    public function __construct(protected EntityManagerInterface $em, protected PlayerRepository $playerRepository, protected ForSaleRepository $forSaleRepository)
    {}

    #[Route('/cancel-for-sale/{id}', name: 'cancel_for_sale')]
    public function cancelForSale(int $id): Response
    {
        $player = $this->playerRepository->find($id);
        
        $idTeam = $player->getTeam()->getId();
        
        $forSales = $this->forSaleRepository->findBy([
            'player' => $player
        ]);
        
        $forSale = $forSales[0];

        $player->setForSale("");
        $this->em->remove($forSale);

        $this->em->flush();

        return $this->redirectToRoute('display_players', [
            'id' => $idTeam
        ]);
    }
}

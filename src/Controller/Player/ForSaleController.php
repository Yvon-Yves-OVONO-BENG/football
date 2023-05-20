<?php

namespace App\Controller\Player;

use App\Entity\ForSale;
use App\Form\ForSaleFormType;
use App\Repository\PlayerRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

/**
 * @IsGranted("ROLE_USER", message="Accès refusé. Espace reservé uniquement aux abonnés")
 *
 */
#[Route('/player')]
class ForSaleController extends AbstractController
{
    public function __construct(protected EntityManagerInterface $em, protected PlayerRepository $playerRepository)
    {}

    #[Route('/for-sale/{id}', name: 'for_sale')]
    public function forSale(Request $request, int $id): Response
    {
        $forSale = new ForSale;
        $player = $this->playerRepository->find($id);

        $idTeam = $player->getTeam()->getId();
        
        $form = $this->createForm(ForSaleFormType::class, $forSale);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) 
        {
            $forSale->setPlayer($player);
            $player->setForSale(1);

            $this->em->persist($forSale);
            $this->em->flush();

            return $this->redirectToRoute('display_players', [
                'id' => $idTeam
            ]);
        }

        return $this->render('forSale/forSale.html.twig', [
            'player' => $player,
            'formForSale' => $form->createView(),
        ]);
    }
}

<?php

namespace App\Controller\SellBuy;

use App\Entity\SellBuy;
use App\Form\SellBuyFormType;
use App\Repository\ForSaleRepository;
use App\Repository\PlayerRepository;
use App\Repository\SellBuyRepository;
use App\Repository\TeamRepository;
use DateTime;
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
#[Route('/sell-buy')]
class BuyPlayerController extends AbstractController
{
    public function __construct(protected EntityManagerInterface $em, protected PlayerRepository $playerRepository, protected TeamRepository $teamRepository, protected SellBuyRepository $sellBuyRepository, protected ForSaleRepository $forSaleRepository)
    {}

    #[Route('/buy-player/{id}', name: 'buy_player')]
    public function buyPlayer(Request $request, int $id): Response
    {
        $player = $this->playerRepository->find($id);
       
        $forSale = $this->forSaleRepository->findBy([
            'player' => $player
        ]);
        
        $forSale = $forSale[0];
        
        $amountForSale = $forSale->getAmount();

        $teamOfPlayer = $this->teamRepository->find($player->getTeam()->getId());
        
        $teams = $this->teamRepository->findTeamDifferentTheTeamOfPlayer($teamOfPlayer->getName());

        $sellBuy = new SellBuy;

        $form = $this->createForm(SellBuyFormType::class, $sellBuy);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) 
        {
            $amountForSale = $request->request->get('amountForSale');
            $teamTo = $this->teamRepository->find($request->request->get('idTeamTo'));
            
            $moneyBalance = $teamTo->getMoneyBalance();

            if ($moneyBalance >= $amountForSale) 
            {
                $now = new DateTime('now');

                $player->setTeam($teamTo)
                        ->setForSale(0)
                ;
                $teamTo->setMoneyBalance($moneyBalance-$amountForSale);
                $teamOfPlayer->setMoneyBalance($teamOfPlayer->getMoneyBalance()+$amountForSale);

                $sellBuy->setFromTeam($teamOfPlayer)
                        ->setToTeam($teamTo)
                        ->setPlayer($player)
                        ->setAmount($amountForSale)
                        ->setDateAt($now)
                        ;

                $this->em->persist($player);
                $this->em->persist($teamTo);
                $this->em->persist($teamOfPlayer); 
                $this->em->persist($sellBuy); 
                $this->em->remove($forSale); 
                $this->em->flush();

                return $this->redirectToRoute('display_for_sale');

            }else 
            {
                $this->addFlash('info', "You don t have a lot of money");
 
                return $this->redirectToRoute('display_for_sale');
            }
            
        }

        return $this->render('sellPlayer/buyPlayer.html.twig', [
            'teams' => $teams,
            'player' => $player,
            'teamOfPlayer' => $teamOfPlayer,
            'amountForSale' => $amountForSale,
            'formSellBuy' => $form->createView()
        ]);
    }
}

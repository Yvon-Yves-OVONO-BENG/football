<?php

namespace App\Controller\Player;

use App\Repository\PlayerRepository;
use App\Repository\TeamRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @IsGranted("ROLE_USER", message="Accès refusé. Espace reservé uniquement aux abonnés")
 *
 */
#[Route('/player')]
class DisplayPlayersController extends AbstractController
{
    public function __construct(protected TeamRepository $teamRepository, protected PlayerRepository $playerRepository)
    {}

    #[Route('/display-players/{id}', name: 'display_players')]
    public function displayPlayers(int $id): Response
    {
        $team = $this->teamRepository->find($id);
        $players = $this->playerRepository->findBy([
            'team' => $team
        ]);

        return $this->render('player/displayPlayers.html.twig', [
            'team' => $team,
            'players' => $players
        ]);
    }
}

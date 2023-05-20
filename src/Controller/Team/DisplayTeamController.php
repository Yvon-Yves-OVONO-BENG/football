<?php

namespace App\Controller\Team;

use App\Repository\TeamRepository;
use Doctrine\Common\Proxy\Proxy;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @IsGranted("ROLE_USER", message="Accès refusé. Espace reservé uniquement aux abonnés")
 *
 */
#[Route('/team')]
class DisplayTeamController extends AbstractController
{
    public function __construct(protected TeamRepository $teamRepository)
    {}

    #[Route('/display-team', name: 'display_team')]
    public function displayTeam(): Response
    {
        $teams = $this->teamRepository->findAll();

        return $this->render('team/displayTeam.html.twig', [
            'teams' => $teams,
        ]);
    }
}

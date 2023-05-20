<?php

namespace App\Controller\Team;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @IsGranted("ROLE_USER", message="Accès refusé. Espace reservé uniquement aux abonnés")
 *
 */
class DeleteTeamController extends AbstractController
{
    #[Route('/delete/team', name: 'app_delete_team')]
    public function index(): Response
    {
        return $this->render('delete_team/index.html.twig', [
            'controller_name' => 'DeleteTeamController',
        ]);
    }
}

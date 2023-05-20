<?php

namespace App\Controller\Player;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @IsGranted("ROLE_USER", message="Accès refusé. Espace reservé uniquement aux abonnés")
 *
 */
class DeletePlayerController extends AbstractController
{
    #[Route('/delete/player', name: 'app_delete_player')]
    public function index(): Response
    {
        return $this->render('delete_player/index.html.twig', [
            'controller_name' => 'DeletePlayerController',
        ]);
    }
}

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
#[Route('/player')]
class EditPlayerController extends AbstractController
{
    #[Route('/edit-player', name: 'edit_player')]
    public function editPlayer(): Response
    {
        return $this->render('update_player/index.html.twig', [
        ]);
    }
}

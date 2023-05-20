<?php

namespace App\Controller\Team;

use App\Form\TeamFormType;
use App\Repository\TeamRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @IsGranted("ROLE_USER", message="Accès refusé. Espace reservé uniquement aux abonnés")
 *
 */
#[Route('/team')]
class EditTeamController extends AbstractController
{
    public function __construct(protected EntityManagerInterface $em, protected TeamRepository $teamRepository )
    {}

    #[Route('/edit-team/{id}', name: 'edit_team')]
    public function editTeam(Request $request, int $id): Response
    {
        $team = $this->teamRepository->find($id);

        $form = $this->createForm(TeamFormType::class, $team);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) 
        {
            $this->em->persist($team);
            $this->em->flush();

            return $this->redirectToRoute('display_team');
        }

        return $this->render('team/addTeam.html.twig', [
            'id' => $id,
            'teamForm' => $form->createView()
        ]);
    }
}

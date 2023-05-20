<?php

namespace App\Controller\Team;

use App\Entity\Team;
use App\Form\TeamFormType;
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
#[Route('/team')]
class AddTeamController extends AbstractController
{
    public function __construct(protected EntityManagerInterface $em)
    {
        
    }
    #[Route('/add-team', name: 'add_team')]
    public function addTeam(Request $request): Response
    {
        $id = null;
        $team = new Team;

        $form = $this->createForm(TeamFormType::class, $team);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) 
        {
            $this->em->persist($team);
            $this->em->flush();

            $team = new Team;

            $form = $this->createForm(TeamFormType::class, $team);
        }
        
        return $this->render('team/addTeam.html.twig', [
            'id' => $id,
            'teamForm' => $form->createView()
        ]);
    }
}

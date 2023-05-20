<?php

namespace App\Form;

use App\Entity\Team;
use App\Entity\Player;
use App\Repository\TeamRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class PlayerFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => "Name",
                'required' => true,
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Name',
                ]
            ])
            ->add('surname', TextType::class, [
                'label' => "Surname",
                'required' => true,
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Surname',
                ]
            ])
            // ->add('team', EntityType::class, [
            //     'label' => false,
            //     'attr' =>  [
            //         'class' => 'form-select'
            //     ],
            //     'class' => Team::class,
            //     'choice_label' => 'name',
            //     'required' => true,
            //     'placeholder' => 'Team',
            //     'query_builder' => function (TeamRepository $teamRepository) {
            //         return $teamRepository->createQueryBuilder('t');
            //     }

            // ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Player::class,
        ]);
    }
}

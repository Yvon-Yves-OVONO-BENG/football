<?php

namespace App\Form;

use App\Entity\Team;
use App\Entity\SellBuy;
use App\Repository\TeamRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class SellBuyFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            // ->add('amount', IntegerType::class, [
            //     'label' => "Money Balance",
            //     'required' => true,
            //     'attr' => [
            //         'class' => 'form-control',
            //         'placeholder' => 'Money Balance',
            //         'min'=> "0",
            //         'step'=> "0.25"
            //     ]
            // ])
            // ->add('fromTeam', EntityType::class, [
            //     'label' => false,
            //     'attr' =>  [
            //         'class' => 'form-control select2'
            //     ],
            //     'class' => Team::class,
            //     'choice_label' => 'name',
            //     'required' => true,
            //     'placeholder' => 'Team',
            //     'query_builder' => function (TeamRepository $teamRepository) {
            //         return $teamRepository->createQueryBuilder('t');
            //     }

            // ])
            // ->add('toTeam', EntityType::class, [
            //     'label' => false,
            //     'attr' =>  [
            //         'class' => 'form-control select2'
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
            'data_class' => SellBuy::class,
        ]);
    }
}

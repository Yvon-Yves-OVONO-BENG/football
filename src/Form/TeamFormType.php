<?php

namespace App\Form;

use App\Entity\Team;
use App\Entity\Country;
use App\Form\PlayerFormType;
use App\Repository\CountryRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class TeamFormType extends AbstractType
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
            ->add('moneyBalance', IntegerType::class, [
                'label' => "Money Balance",
                'required' => true,
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Money Balance',
                    'min'=> "0",
                    'step'=> "0.25"
                ]
            ])
            ->add('country', EntityType::class, [
                'label' => "Country",
                'attr' =>  [
                    'class' => 'form-control select2'
                ],
                'class' => Country::class,
                'choice_label' => 'en',
                'required' => true,
                'placeholder' => 'Country',
                'query_builder' => function (CountryRepository $countryRepository) {
                    return $countryRepository->createQueryBuilder('c');
                }
    
            ])
            ->add('players', CollectionType::class, [
                'label' => false,
                'entry_type' => PlayerFormType::class,
                'entry_options' => [
                    'label' => false
                ],
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Team::class,
        ]);
    }
}

<?php

namespace App\Form;

use App\Entity\Doubleur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DoubleurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('profession')
            ->add('importance')
            ->add('personnalite')
            ->add('film')
            ->add('serie')
            ->add('episode')
            ->add('jeu')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Doubleur::class,
        ]);
    }
}

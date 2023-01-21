<?php

namespace App\Form;

use App\Entity\Musique;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MusiqueType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titreOriginal')
            ->add('surTitreOriginal')
            ->add('sousTitreOriginal')
            ->add('titreFrancais')
            ->add('surTitreFrancais')
            ->add('sousTitreFrancais')
            ->add('image')
            ->add('annee')
            ->add('duree')
            ->add('genre')
            ->add('chronologie')
            ->add('noteMusique')
            ->add('art')
            ->add('morceaux')
            ->add('compositeurs')
            ->add('labels')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Musique::class,
        ]);
    }
}

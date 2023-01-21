<?php

namespace App\Form;

use App\Entity\Serie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SerieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titreFrancais')
            ->add('surTitreFrancais')
            ->add('sousTitreFrancais')
            ->add('titreOriginal')
            ->add('surTitreOriginal')
            ->add('sousTiTreOriginal')
            ->add('image')
            ->add('anneeDebut')
            ->add('anneeFin')
            ->add('duree')
            ->add('genre')
            ->add('chronologie')
            ->add('format')
            ->add('noteSerie')
            ->add('noteImage')
            ->add('description')
            ->add('avis')
            ->add('art')
            ->add('auteur')
            ->add('scenaristes')
            ->add('realisateurs')
            ->add('producteurs')
            ->add('acteurs')
            ->add('doubleurs')
            ->add('compositeurs')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Serie::class,
        ]);
    }
}

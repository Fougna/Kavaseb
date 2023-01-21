<?php

namespace App\Form;

use App\Entity\Film;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FilmType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titreFrancais')
            ->add('surTitreFrancais')
            ->add('sousTitreFrancais')
            ->add('titreOriginal')
            ->add('surTitreOriginal')
            ->add('sousTitreOriginal')
            ->add('image')
            ->add('annee')
            ->add('duree')
            ->add('genre')
            ->add('chronologie')
            ->add('format')
            ->add('noteFilm')
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
            'data_class' => Film::class,
        ]);
    }
}

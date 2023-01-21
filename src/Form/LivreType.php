<?php

namespace App\Form;

use App\Entity\Livre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LivreType extends AbstractType
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
            ->add('nombreDePages')
            ->add('isbn')
            ->add('genre')
            ->add('chronologie')
            ->add('noteLivre')
            ->add('noteReliure')
            ->add('description')
            ->add('avis')
            ->add('art')
            ->add('auteurs')
            ->add('editeurFrancais')
            ->add('traducteurs')
            ->add('prefaces')
            ->add('editeurOriginals')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Livre::class,
        ]);
    }
}

<?php

namespace App\Form;

use App\Entity\Jeu;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class JeuType extends AbstractType
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
            ->add('image', FileType::class, [
                'mapped' => false,
                'required' => false
                ])
            ->add('annee')
            ->add('genre')
            ->add('chronologie')
            ->add('nombreJoueursMin')
            ->add('nombreJoueursMax')
            ->add('noteJeu')
            ->add('description')
            ->add('avis')
            ->add('art', FileType::class, [
                'mapped' => false,
                'required' => false
                ])
            ->add('auteur')
            ->add('scenaristes')
            ->add('acteurs')
            ->add('doubleurs')
            ->add('systemes')
            ->add('developpeurs')
            ->add('editeurs')
            ->add('compositeurs')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Jeu::class,
        ]);
    }
}

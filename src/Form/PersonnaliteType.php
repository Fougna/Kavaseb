<?php

namespace App\Form;

use App\Entity\Personnalite;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class PersonnaliteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('alias')
            ->add('sexe')
            ->add('nationalite')
            ->add('naissance', DateType::class, [
                'widget' => 'single_text',
                'years' => range(date('Y') - 5000, date('Y')),
                ])
            ->add('deces', DateType::class, [
                'widget' => 'single_text',
                'years' => range(date('Y') - 5000, date('Y')),
                ])
            ->add('photo', FileType::class, [
            'mapped' => false,
            'required' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Personnalite::class,
        ]);
    }
}
<?php

namespace App\Form;

use App\Entity\Profession;
use App\Entity\Personnalite;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

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
                'required' => false
                ])
            ->add('deces', DateType::class, [
                'widget' => 'single_text',
                'years' => range(date('Y') - 5000, date('Y')),
                'required' => false
                ])
            ->add('professions')
            ->add('importance')
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
<?php

namespace App\Form;

use App\Entity\UniversityDegree;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UniversityDegreeTypeForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
       $builder
        ->add('university', EntityType::class, [
            'class' => University::class,
            'choice_label' => 'name',
        ])
        ->add('degree', EntityType::class, [
            'class' => Degree::class,
            'choice_label' => 'name',
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => UniversityDegree::class,
        ]);
    }
}

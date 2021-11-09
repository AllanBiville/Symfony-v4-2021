<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TableChoiceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('table_number', ChoiceType::class, [
            //'attr' => ['style' => 'width:35px'],
            'choices' => [
                'Table de 1' => 1,
                'Table de 2' => 2,
                'Table de 3' => 3,
                'Table de 4' => 4,
                'Table de 5' => 5,
                'Table de 6' => 6,
                'Table de 7' => 7,
                'Table de 8' => 8,
                'Table de 9' => 9,
            ],
        ])->add('table_max', ChoiceType::class, [
            //'attr' => ['style' => 'width:35px'],
            'choices' => [
                'Max 1' => 1,
                'Max 2' => 2,
                'Max 3' => 3,
                'Max 4' => 4,
                'Max 5' => 5,
                'Max 6' => 6,
                'Max 7' => 7,
                'Max 8' => 8,
                'Max 9' => 9,
            ],
        ])->add('table_color', ChoiceType::class, [
            //'attr' => ['style' => 'width:35px'],
            'choices' => [
                'Couleur rouge' => 'red',
                'Couleur jaune' => 'yellow',
                'Couleur orange' => 'orange',
                'Couleur marron' => 'brown',
                'Couleur noir' => 'black',
                'Couleur gris' => 'gray',
                'Couleur violet' => 'purple',
                'Couleur pink' => 'pink',
                'Couleur bleu' => 'blue',
            ],
        ])

            ->add('Choisir', SubmitType::class, [
                'attr' => ['class' => 'save'],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}

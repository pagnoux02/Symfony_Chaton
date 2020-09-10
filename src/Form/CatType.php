<?php

namespace App\Form;

use App\Entity\Cat;
use Symfony\Component\DomCrawler\Image;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CatType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('picture',FileType::class,[
                'mapped'=> false,
//                'constraints'=> [ new Image([
//                    'minWidth' => 200,
//                    'maxWidth' => 400,
//                    'minHeight' => 200,
//                    'maxHeight' => 400,
//                ])
//                ],
            ])
            ->add('description')
            ->add('price')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Cat::class,
        ]);
    }
}

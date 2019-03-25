<?php

namespace App\Form;

use App\Entity\Choferes;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChoferesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('timeStamp')
            ->add('nombre')
            ->add('apellido')
            ->add('dni')
            ->add('direccion')
            ->add('tel')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Choferes::class,
        ]);
    }
}

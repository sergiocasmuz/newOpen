<?php

namespace App\Form;

use App\Entity\CuentasCorrientes;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CuentasCorrientesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('apellido',TextType::class, ['attr'=>['class'=>'form-control' ]])
            ->add('nombre',TextType::class, ['attr'=>['class'=>'form-control' ]])
            ->add('direccion',TextType::class, ['attr'=>['class'=>'form-control' ]])
            ->add('telefono',TextType::class, ['attr'=>['class'=>'form-control' ]])
            ->add('dni', IntegerType::class, ['attr'=>['class'=>'form-control' ]])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CuentasCorrientes::class,
        ]);
    }
}

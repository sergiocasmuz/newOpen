<?php

namespace App\Form;

use App\Entity\Choferes;;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class Choferes1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre', TextType::class, ['attr'=>['class'=>'form-control' ]])
            ->add('apellido',TextType::class, ['attr'=>['class'=>'form-control' ]])
            ->add('dni',IntegerType::class, ['attr'=>['class'=>'form-control' ]])
            ->add('tel',TextType::class, ['attr'=>['class'=>'form-control' ]])
            ->add('direccion',TextType::class, ['attr'=>['class'=>'form-control' ]])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Choferes::class,
        ]);
    }
}

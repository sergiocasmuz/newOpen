<?php

namespace App\Form;

use App\Entity\Viajes;
use App\Entity\Choferes;
use App\Entity\CuentasCorrientes;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ViajesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('salida',TimeType::class,['attr'=>['class'=>'form-control' ]])
            ->add('llegada',TimeType::class,['attr'=>['class'=>'form-control' ]])
            ->add('desde',TextType::class,['attr'=>['class'=>'form-control' ]])
            ->add('hasta',TextType::class,['attr'=>['class'=>'form-control' ]])
            ->add('diaLaboral',IntegerType::class,['attr'=>['class'=>'form-control' ]])
            ->add('monto',MoneyType::class,['attr'=>['class'=>'form-control' ]])
            ->add('chofer', EntityType::class, [
                          'class' => Choferes::class,
                          'choice_label' => 'nombre',
                        ])
            ->add('cc', EntityType::class, [
                          'class' => CuentasCorrientes::class,
                          'choice_label' => 'apellido',
                        ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Viajes::class,
        ]);
    }
}

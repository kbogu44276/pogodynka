<?php

namespace App\Form;

use App\Entity\Location;
use App\Entity\Measurement;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class MeasurementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date', DateType::class, [
                'widget' => 'single_text',
                'label' => 'Date',
            ])
            ->add('celsius', NumberType::class, [
                'label' => 'Celsius',
                'scale' => 0,
                'attr' => ['placeholder' => 'Enter temperature [°C]']
            ])
            ->add('wind', NumberType::class, [
                'label' => 'Wind',
                'scale' => 2,
                'required' => false,
                'attr' => ['placeholder' => 'Enter wind [km/h]']
            ])
            ->add('pressure', NumberType::class, [
                'label' => 'Pressure',
                'scale' => 2,
                'required' => false,
                'attr' => ['placeholder' => 'Enter pressure [hPa]']
            ])
            ->add('chanceOfPrecipitation', IntegerType::class, [
                'label' => 'Chance of precipitation',
                'required' => false,
                'attr' => ['placeholder' => 'Enter chance of precipitation [%]']
            ])
            ->add('location', EntityType::class, [
                'class' => Location::class,
                'choice_label' => 'city',
                'label' => 'Location',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Measurement::class,
        ]);
    }
}

<?php

namespace App\Form;

use App\Entity\Booking;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BookingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname')
            ->add('lastname')
            ->add('phone')
            ->add('concert1', IntegerType::class)
            ->add('concert2', IntegerType::class)
            ->add('concert3', IntegerType::class)
            ->add('concert4', IntegerType::class)
            ->add('concert5', IntegerType::class)
            ->add('concert6', IntegerType::class)
            ->add('concert7', IntegerType::class)
            ->add('concert8', IntegerType::class)
            ->add('concert9', IntegerType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Booking::class,
        ]);
    }
}

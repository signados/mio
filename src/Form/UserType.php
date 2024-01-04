<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', null, [
                'attr' => [
                    'class'=>'form-control'
                ]
            ])
            ->add('name', null, [
                'attr' => [
                    'class'=>'form-control'
                ]
            ])
            ->add('surname', null, [
                'attr' => [
                    'class'=>'form-control'
                ]
            ])
            ->add('age', null, [
                'attr' => [
                    'class'=>'form-control'
                ]
            ])
            //->add('password')
            //->add('roles')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}

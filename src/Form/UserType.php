<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, ['label'=>'Adresse e-mail'])
            ->add('roles', ChoiceType::class,[
                'choices' =>[
                    'ROLE_ADMIN' => 'ROLE_ADMIN',
                    'ROLE_USER'=> 'ROLE_USER',
                ]
            ,
            'label' => 'Role de l\'utilisateur',
                'expanded' => true,
                'multiple'=> true,
                ])
            ->add('password', PasswordType::class, ['label'=>'Mot de passe'])
            ->add('isVerified')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}

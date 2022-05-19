<?php

namespace App\Form;

use App\Entity\Article;
use App\Entity\Tags;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AJoutArticleFormType extends AbstractType
{        public function buildForm(FormBuilderInterface $builder, array $options)
        {
            $builder
                ->add('titre')
                ->add('contenu', Article::class)
                ->add('image', Article::class, [
                    'label' => 'Image mise en avant'
                ])
                ->add('categorie', Article::class, [
                    'class' => Article::class,
                    'label' => 'categorie',
                    'multiple' => true,
                    'expanded' => true
                ])
                ->add('tags', Article::class, [
                    'class' => Tags::class,
                    'label' => 'Tags',
                    'multiple' => true,
                    'expanded' => true
                ])
                ->add('publie', Article::class);
        }

        public
        function configureOptions(OptionsResolver $resolver)
        {
            $resolver->setDefaults([
                'data_class' => Articles::class,
            ]);
        }
}
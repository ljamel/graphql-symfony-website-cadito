<?php

namespace App\Form;

use App\Entity\Activitys;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ActivitysType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('description')
            ->add('link')
            ->add('prices')
            ->add('note')
            ->add('address')
            ->add('ville')
            ->add('img')
            ->add('latitude')
            ->add('longitude')
            ->add('postcode')
            ->add('iduserId')
            ->add('publish')
            ->add('slug')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Activitys::class,
        ]);
    }
}

<?php

namespace App\Form;

use App\Entity\Tmp;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class TmpType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('login')
            ->add('pass', PasswordType::class)
            ->add('Se_connecter', SubmitType::class ,
                array('attr'=>
                    array(
                        'label'=>'Se connecter',
                        'class'=>'button button-primary button-large',
                        'id'=>'wp-submit') ) )
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Tmp::class,
        ]);
    }
}

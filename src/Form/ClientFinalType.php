<?php

namespace App\Form;

use App\Entity\ClientFinal;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClientFinalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('raison_sociale')
            ->add('responsable')
            ->add('adresse')
            ->add('codepostal')
            ->add('ville')
            ->add('telephone')
            ->add('fax')
            ->add('mobile')
            ->add('email')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ClientFinal::class,
        ]);
    }
}

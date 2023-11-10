<?php

namespace App\Form;

use App\Entity\Lcommande;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LcommandeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Numc')
            ->add('pv')
            ->add('qte')
            ->add('tva')
            ->add('lig')
            ->add('prodCpmm')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Lcommande::class,
        ]);
    }
}

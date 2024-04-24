<?php

namespace App\Form;

use App\Entity\Facturation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FacturationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date',$type = null, $options = [
                'widget' => 'single_text',
            ])
            ->add('client',$type = null, $options = [
                'label' => 'Le client',
                ])
            ->add('colis',$type = null, $options = [
                'label' => 'Nbre de colis',
                ])
            ->add('prixht',$type = null, $options = [
                'label' => 'prix HT',
                ])
            ->add('prixttc',$type = null, $options = [
                'label' => 'prix TTC',
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Facturation::class,
        ]);
    }
}

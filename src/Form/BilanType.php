<?php

namespace App\Form;

use App\Entity\Bilan;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotNull;

class BilanType extends AbstractType
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
            ->add('vehicule',$type = null, $options = [
                'label' => 'Immatriculation du vehicule ',
                ])
            ->add('distances',$type = null, $options = [
                'label' => 'Distances parcourues(kms) ',
                ])
            ->add('depenses',$type = null, $options = [
                'label' => 'Depenses effectuées(£) ',
                ])
            ->add('rotations',$type = null, $options = [
                'label' => 'Nbre de rotations ',
                ])
            ->add('volumes',$type = null, $options = [
                'label' => 'Volumes transportés(m3) ',
                ])
            ->add('facturation')
            ->add('observations')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Bilan::class,
        ]);
    }
}

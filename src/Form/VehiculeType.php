<?php

namespace App\Form;

use App\Entity\Vehicule;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VehiculeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('matricule',$type = null, $options = [
                'label' => 'immatriculation vehicule',
                ])
            ->add('assurance',$type = null, $options = [
                'label' => 'Date de fin validite assurance',
                ])
            ->add('controle',$type = null, $options = [
                'label' => 'Controle technique',
                ])
            ->add('circulation',$type = null, $options = [
                'label' => 'Date de mis en circulation',
                ])
            ->add('entretien',$type = null, $options = [
                'label' => 'Dernier entretien',
                ])
            ->add('kilometres',$type = null, $options = [
                'label' => 'kilometrage',
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Vehicule::class,
        ]);
    }
}

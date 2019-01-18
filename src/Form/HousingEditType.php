<?php

namespace App\Form;

use App\Entity\Housing;
use App\Entity\Owner;
use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HousingEditType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('maxTraveler')
            ->add('bathroomNumber')
            ->add('defaultPrice')
            ->add('minDays')
            ->add('travelerSupp')
            ->add('suppPrice')
            ->add('area')
            ->add('address',AddressType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Housing::class,
        ]);
    }
}
?>

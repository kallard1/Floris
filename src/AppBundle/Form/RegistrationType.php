<?php

namespace AppBundle\Form;

use AppBundle\Entity\AddressCustomer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationType extends AbstractType
{

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder->add('businessName')
            ->add('companyRegister')
            ->add('vatNumber')
            ->add('addresses',  CollectionType::class, array(
                'entry_type' => AddressCustomerType::class,
                'entry_options' => array('label' => false),
                'prototype_name' => 'address__name__',
                'allow_add' => false,
                'allow_delete' => false,
                'prototype' => true,
                'by_reference' => false
            ));
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }
}

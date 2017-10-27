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
            ->add('address', CollectionType::class, [
                'entry_type' => AddressCustomerType::class,
                'allow_add' => false,
                'by_reference' => false
            ]);
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

<?php

namespace AppBundle\Form;

use AppBundle\Entity\AddressCustomer;
use Symfony\Component\Form\AbstractType;
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
            ->add('address', AddressCustomerType::class, [
                'data_class' => 'AppBundle\Entity\AddressCustomer'
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

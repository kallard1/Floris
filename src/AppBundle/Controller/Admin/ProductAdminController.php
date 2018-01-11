<?php

namespace AppBundle\Controller\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

class ProductAdminController extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', 'text')
            ->add('description', 'textarea')
            ->add('status', 'checkbox', ['required' => false])
            ->add('sku', 'text')
            ->add('price', 'number')
            ->add('promotion', 'checkbox')
            ->add('vatRate', 'sonata_type_model_list')
            ->add('stock', 'integer');
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('name');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('name');
    }
}
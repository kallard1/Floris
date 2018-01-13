<?php

namespace AppBundle\Controller\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\Filter\ChoiceType;

class ProductAdminController extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->tab('Product')
                ->with('Product')
                    ->add('name', 'text')
                    ->add('description', 'textarea')
                    ->add('sku', 'text')
                    ->add('status', 'checkbox', [
                        'label' => 'Active',
                        'required' => false
                    ])
                ->end()
            ->end()
            ->tab('Inventory')
                ->with('Inventory')
                    ->add('stock', 'integer')
                ->end()
            ->end()
            ->tab('Price')
                ->with('Price')
                    ->add('price', 'number')
                    ->add('promotion','choice', [
                        'choices' => array_combine(range(0, 100, 5), range(0, 100, 5))
                    ])
                    ->add('vatRate', 'sonata_type_model', [
                        'class' => 'AppBundle\Entity\VatRate',
                        'property' => 'name',
                        'btn_add' => false
                    ])
                ->end()
            ->end()
            ->tab('Categories')
                ->with('Categories')
                    ->add('categories', 'sonata_type_model', [
                        'multiple' => true,
                        'btn_add' => false,
                        'expanded' => true,
                    ])
                ->end()
            ->end();
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('name');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('id')
        ->addIdentifier('name')
        ->add('status', null, [
            'editable' => true
        ])
        ->add('stock')
        ->add('price')
        ->add('promotion','choice', [
            'choices' => array_combine(range(0, 100, 5), range(0, 100, 5)),
            'editable' => true
        ]);
    }
}
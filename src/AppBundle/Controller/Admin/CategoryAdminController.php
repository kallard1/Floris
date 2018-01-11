<?php

namespace AppBundle\Controller\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

class CategoryAdminController extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Content')
            ->add('name', 'text')
            ->add('description', 'textarea')
            ->add('status', 'checkbox', ['required' => false])
            ->end()
            ->with('Category')
            ->add('parent', 'sonata_type_model', [
                'required' => false,
                'class' => 'AppBundle\Entity\Category',
                'property' => 'name'
            ])
            ->end();
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('name')
            ->add('slug')
            ->add('status')
            ->add('createdAt')
            ->add('updatedAt');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('name')
            ->add('slug')
            ->add('status', null, [
                'editable' => true
            ])
            ->add('parent', null, [], 'entity', [
                'class' => 'AppBundle\Entity\Category',
                'associated_property' => 'name'])
            ->add('createdAt')
            ->add('updatedAt');
    }
}
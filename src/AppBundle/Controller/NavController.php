<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class NavController extends Controller
{
    public function categoriesAction()
    {
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Category');

        $categories = $repository->getActivesCategories();

        return $this->render('::partials:nav.html.twig', array(
            'categories' => $categories
        ));
    }
}

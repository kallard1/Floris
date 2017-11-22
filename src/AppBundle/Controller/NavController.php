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

        $categories = $repository->getCategories(true);

        return $this->render('AppBundle:partials:categories.html.twig', array(
            'categories' => $categories
        ));
    }
}

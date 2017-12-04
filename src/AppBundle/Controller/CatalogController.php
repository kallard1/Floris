<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class CatalogController extends Controller
{
    /**
     * @Route("/catalog/{slug}", name="catalog")
     */
    public function indexAction($slug)
    {

        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Product');

        $categories = $repository->getCatalogProduct();

        return $this->render('AppBundle:Catalog:index.html.twig', array(
            'slug' => $slug
        ));
    }

}

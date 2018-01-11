<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Category;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CatalogController extends Controller
{
    /**
     * @Route("/catalog/{slug}", name="catalog")
     * @ParamConverter("category", class="AppBundle\Entity\Category", options={"slug" = "slug"})
     * @param Category $category
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Category $category)
    {
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Product');

        $products = $repository->getCatalogProduct($category);

        dump($products);

        return $this->render('AppBundle:Catalog:index.html.twig', []);
    }

}

<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Category;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

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
        $manager = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Product');

        return $this->render('AppBundle:Catalog:index.html.twig', [
            'products' => $manager->getCatalogProduct($category),
            'category' => $category,
        ]);
    }
}

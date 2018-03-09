<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Cart;
use AppBundle\Entity\Product;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CartController extends Controller
{
    /**
     * @Route("/cart/{sku}/add", name="add_to_cart")
     * @ParamConverter("product", class="AppBundle\Entity\Product", options={"sku" = "sku"})
     * @param Request $request
     * @param Product $product
     */
    public function addToCartAction(Request $request, Product $product)
    {
        $manager = $this->getDoctrine()->getManager();

        $currentUser = $this->get('security.token_storage')->getToken()->getUser();

        $cart = $manager->getRepository('AppBundle:Cart');

        $userCart = $cart->findOneBy(['customer' => $currentUser->getId()]);

        if (!$userCart) {
            $newCart = new Cart();
            $newCart->setCustomer($currentUser);

            $manager->persist($newCart);
            $manager->flush();
        }
        $userCart->addProduct($product);
        $manager->persist($userCart);
        $manager->flush();
    }
}
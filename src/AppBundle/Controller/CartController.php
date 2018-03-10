<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Product;
use Doctrine\ORM\EntityNotFoundException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CartController extends Controller
{
    /**
     * @Route("/cart/add/{id}", name="add_to_cart")
     * @ParamConverter("product", class="AppBundle:Product")
     * @param Request $request
     * @param Product $product
     * @return Response
     */
    public function addAction(Request $request, Product $product)
    {
        $quantity = $request->query->get('quantity', 1);
        if ($quantity < 1) {
            return new Response('Quantitée négative ou de 0', '400');
        }
        $session   = $request->getSession();
        $products  = $session->get('products', []);
        $found     = false;
        $promotion = $product->getPromotion() == null ? null : $product->getPromotion();
        foreach ($products as $key => $value) {
            if ($product->getId() === $value['product']->getId()) {
                $products[$key]['quantity'] += $quantity;
                $found                      = true;
            }
        }
        if ($found == false) {
            array_push($products, ['product' => $product, 'quantity' => $quantity, 'promotion' => $promotion]);
        }
        $session->set('products', $products);
        return new Response();
    }

    /**
     * @Route("/cart", name="cart")
     * @param Request $request
     * @return int|Response
     */
    public function listAction(Request $request)
    {
        $products = $request->getSession()->get('products', []);

        return $this->render('AppBundle:Cart:list.html.twig', [
            'products' => $products,

        ]);
    }

    /**
     * @Route("/cart/remove/{id}", name="remove_to_cart")
     * @ParamConverter("product", class="AppBundle:Product")
     * @param Request $request
     * @param Product $product
     * @return Response
     * @throws EntityNotFoundException
     */
    public function deleteAction(Request $request, Product $product)
    {
        $session  = $request->getSession();
        $products = $session->get('products', []);
        $found    = false;
        foreach ($products as $key => $value) {
            if ($product->getId() === $value['product']->getId()) {
                unset($products[$key]);
                $found = true;
            }
        }
        if ($found == false) {
            throw new EntityNotFoundException('La ressource demandée n\'existe pas dans le panier.');
        }
        $session->set('products', $products);
        return $this->redirectToRoute('cart');
    }
}
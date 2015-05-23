<?php

namespace Caravane\Bundle\ShopBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Caravane\Bundle\ShopBundle\Document\Product;
use Caravane\Bundle\ShopBundle\Form\ProductType;

/**
 * Product controller.
 *
 */
class ProductController extends Controller
{

    /**
     * Lists all Product entities.
     *
     */
    public function indexAction()
    {
        $dm = $this->get('doctrine_phpcr')->getManager();
        $products = $dm->getRepository('CaravaneShopBundle:Product')->findAll();
        return $this->render('CaravaneShopBundle:Product:index.html.twig', array(
            'products' => $products,
        ));
    }

}

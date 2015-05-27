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
     * Lists all Products.
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


    /**
     * Creates a new Product.
     *
     */
    public function createAction(Request $request)
    {
        $dm = $this->get('doctrine_phpcr')->getManager();
        $product = new Product();
        $form = $this->createCreateForm($product);
        $form->handleRequest($request);

        $rootProduct = $dm->find(null, '/shop/products');
        $product->setParent($rootProduct);
        $product->setName($product->getTitle());
        $product->setSlug($product->getTitle());
        $product->setInsertDate(new \Datetime('now'));
        $product->setUpdateDate(new \Datetime('now'));
        if ($form->isValid()) {

            $dm->persist($product);
            $dm->flush();

            return $this->redirect($this->generateUrl('caravane_admin_shop_product'));
        }

        return $this->render('CaravaneShopBundle:Product:new.html.twig', array(
            'product' => $product,
            'form'   => $form->createView(),
        ));
    }


    /**
     * Creates a form to create a Product.
     *
     * @param Product $product The product
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Product $product)
    {
        $form = $this->createForm(new ProductType(), $product, array(
            'action' => $this->generateUrl('caravane_admin_shop_product_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }



    /**
     * Displays a form to create a new Product.
     *
     */
    public function newAction()
    {
        $product = new Product();
        $form   = $this->createCreateForm($product);

        return $this->render('CaravaneShopBundle:Product:new.html.twig', array(
            'product' => $product,
            'form'   => $form->createView(),
        ));
    }




    /**
     * Import a new Product.
     *
     */
    public function importAction(Request $request)
    {
        $productManager=$this->get('caravane_shop.product_manager');
        $productManager->import();
        die();

    }

}

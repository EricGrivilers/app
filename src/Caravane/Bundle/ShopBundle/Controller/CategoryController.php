<?php

namespace Caravane\Bundle\ShopBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Caravane\Bundle\CoreBundle\Controller\CategoryController as BaseCategoryCaontroller;
use Caravane\Bundle\ShopBundle\Document\Product;
use Caravane\Bundle\ShopBundle\Form\ProductType;

/**
 * Category controller.
 *
 */
class CategoryController extends BaseCategoryCaontroller
{

    /**
     * Lists all Category
     *
     */
    public function indexAction()
    {
        $dm = $this->get('doctrine_phpcr')->getManager();
        $categories = $dm->getRepository('CaravaneCoreBundle:Category')->findAll();
        return $this->render('CaravaneCoreBundle:Category:index.html.twig', array(
            'categories' => $categories,
        ));
    }

}

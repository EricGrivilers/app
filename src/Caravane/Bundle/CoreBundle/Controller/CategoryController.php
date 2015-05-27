<?php

namespace Caravane\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Caravane\Bundle\CoreBundle\Document\Category;

/**
 * Category controller.
 *
 */
class CategoryController extends Controller
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
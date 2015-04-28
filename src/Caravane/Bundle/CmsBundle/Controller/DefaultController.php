<?php

namespace Caravane\Bundle\CmsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CaravaneCmsBundle:Default:index.html.twig', array());
    }
}

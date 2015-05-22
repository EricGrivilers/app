<?php

namespace Caravane\Bundle\CrmBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('CaravaneCrmBundle:Default:index.html.twig', array('name' => $name));
    }
}

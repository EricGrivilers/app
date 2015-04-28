<?php

namespace Caravane\Bundle\CmsBundle\Twig;


class NodeExtension extends \Twig_Extension
{


    public function getName()
    {
        return 'node';
    }

    public function getFunctions()
    {
        return array(
            'node' => new \Twig_Function_Method($this, 'renderNode', array('is_safe' => array('html')))
        );
    }

    public function renderNode($area) {
        return $area;
    }

}
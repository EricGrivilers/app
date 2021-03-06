<?php

namespace Caravane\Bundle\CmsBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TreeType extends AbstractType {
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array());
    }

    public function getParent() {
        return 'choice';
    }

    public function getName() {
        return 'caravane_cms_tree';
    }
}
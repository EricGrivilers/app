<?php

namespace Caravane\Bundle\CmsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class NodeType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type')
            ->add('content')
            ->add('attributes')
            ->add('public')
            ->add('created')
            ->add('updated')
            ->add('createdBy')
            ->add('updatedBy')
            ->add('contentChangedBy')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Caravane\Bundle\CmsBundle\Entity\Node'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'caravane_bundle_cmsbundle_node';
    }
}

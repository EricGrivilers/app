<?php

namespace Caravane\Bundle\CmsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AreaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('template')
            ->add('lft')
            ->add('lvl')
            ->add('rgt')
            ->add('root')
            ->add('created')
            ->add('updated')
            ->add('page')
            ->add('node')
            ->add('parent')
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
            'data_class' => 'Caravane\Bundle\CmsBundle\Entity\Area'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'caravane_bundle_cmsbundle_area';
    }
}

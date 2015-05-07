<?php

namespace Caravane\Bundle\CmsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PageType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('slug')
            ->add('title')
           // ->add('template')
           // ->add('public')

            ->add('parent', 'phpcr_document', array(
               'property' => 'title',
               'class'=> 'Caravane\Bundle\CmsBundle\Document\Page',
               'multiple'=>false
           ))

        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Caravane\Bundle\CmsBundle\Document\Page'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'caravane_bundle_cmsbundle_page';
    }
}

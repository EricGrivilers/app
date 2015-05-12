<?php

namespace Caravane\Bundle\ShopBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Doctrine\ODM\PHPCR\DocumentRepository;


class CategoryType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('active')
            ->add('parent', 'phpcr_document', array(
                'property' => 'id',
                'class'=> 'Caravane\Bundle\ShopBundle\Document\Category',
                'multiple'=>false,
                /*'query_builder' => function (DocumentRepository $er) {
                    return $er->getTree()
                        ;
                },*/
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Caravane\Bundle\ShopBundle\Document\Category'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'caravane_shopbundle_category';
    }


}

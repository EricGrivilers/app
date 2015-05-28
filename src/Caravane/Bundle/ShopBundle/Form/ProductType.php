<?php

namespace Caravane\Bundle\ShopBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProductType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('sku')
            ->add('reference')
            //->add('provider')
            ->add('price')
            ->add('attributes')
            ->add('description')
            ->add('meta_description')
            ->add('meta_keywords')
            ->add('active')
            ->add('stock')

        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Caravane\Bundle\ShopBundle\Document\Product'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'caravane_shop_product_type';
    }
}

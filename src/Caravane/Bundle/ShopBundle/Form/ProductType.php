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
            ->add('name')
            ->add('sku')
            ->add('reference')
            ->add('provider')
            ->add('price')
            ->add('attributes')
            ->add('description')
            ->add('meta_description')
            ->add('meta_keywords')
            ->add('insertDate')
            ->add('updateDate')
            ->add('active')
            ->add('stock')
            ->add('year')
            ->add('color')
            ->add('appellation')
            ->add('region')
            ->add('typicite')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Caravane\ShopBundle\Entity\Product'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'caravane_shopbundle_product';
    }
}

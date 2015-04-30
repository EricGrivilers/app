<?php

namespace Caravane\Bundle\ShopBundle\Manager;

use Doctrine\ORM\EntityManager;
use Caravane\ShopBundle\Entity\Product;
use Caravane\ShopBundle\Entity\Category;

class ProductManager {

    protected $em;
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }



    public function import($products) {
        //var_dump($products);
        $em=$this->em;
        $rootCategories=array();
        $categories=$em->getRepository('CaravaneShopBundle:Category')->findBy(array('lvl'=>0));
        foreach($categories as $category) {
            $rootCategories[$category->getName()]=$category;
        }
        foreach($products as $product) {
            if(is_string($product->Couleur)) {
                $parentCategory=$rootCategories['Couleur'];
                if(!$category = $em->getRepository('CaravaneShopBundle:Category')->findOneBy(array(
                    'lvl'=>1,
                    'root'=>$parentCategory,
                    'parent'=>$parentCategory,
                    'name'=>$product->Couleur
                ))) {
                    $category=new Category();
                    $category->setParent($parentCategory);
                    $category->setName($product->Couleur);
                    $category->setActive(true);
                    $category->setInsertDate(new \Datetime('now'));
                    $category->setUpdateDate(new \Datetime('now'));
                    $em->persist($category);
                }
            }

            echo $product->DesignationBD." - ".$product->Codevin."<br/>";
        }
        $em->flush();

    }
}
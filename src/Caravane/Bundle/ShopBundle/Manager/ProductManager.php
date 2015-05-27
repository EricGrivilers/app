<?php

namespace Caravane\Bundle\ShopBundle\Manager;

use Doctrine\ODM\PHPCR\DocumentManager;
use Caravane\Bundle\ShopBundle\Document\Product;
use Caravane\Bundle\CoreBundle\Document\Category;

class ProductManager {

    protected $dm;
    public function __construct(DocumentManager $dm)
    {
        $this->$dm = $dm;
    }



    public function import($products) {
        //var_dump($products);
        $dm=$this->dm;
        $rootCategories=array();
        $categories=$dm->getRepository('CaravaneShopBundle:Category')->findBy(array('lvl'=>0));
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
                    $dm->persist($category);
                }
            }

            echo $product->DesignationBD." - ".$product->Codevin."<br/>";
        }
        $em->flush();

    }
}
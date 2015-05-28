<?php

namespace Caravane\Bundle\ShopBundle\Manager;

use Doctrine\ODM\PHPCR\DocumentManager;
use Caravane\Bundle\ShopBundle\Document\Product;
use Caravane\Bundle\CoreBundle\Document\Category;

class ProductManager {

    protected $dm;
    public function __construct(DocumentManager $dm)
    {
        $this->dm = $dm;
    }



    public function import($products) {
        //var_dump($products);
        $dm=$this->dm;
        $rootCategories=array();
        $rootCategory = $dm->find(null, '/shop/categories');
        $rootProduct = $dm->find(null, '/shop/products');


        if(!$categoryColor = $dm->getRepository('CaravaneCoreBundle:Category')->find("/shop/categories/Couleur")) {
            $categoryColor=new Category();
            $categoryColor->setName('Couleur');
            $categoryColor->setSlug('couleur');
            $categoryColor->setTitle('Couleur');
            $categoryColor->setParent($rootCategory);
            $dm->persist($categoryColor);
        }
        if(!$categoryAppellation = $dm->getRepository('CaravaneCoreBundle:Category')->find("/shop/categories/Appellation")) {
            $categoryAppellation=new Category();
            $categoryAppellation->setName('Appellation');
            $categoryAppellation->setSlug('appellation');
            $categoryAppellation->setTitle('Appellation');
            $categoryAppellation->setParent($rootCategory);
            $dm->persist($categoryAppellation);
        }
        if(!$categoryYear = $dm->getRepository('CaravaneCoreBundle:Category')->find("/shop/categories/Année")) {
            $categoryYear=new Category();
            $categoryYear->setName('Année');
            $categoryYear->setSlug('annee');
            $categoryYear->setTitle('Année');
            $categoryYear->setParent($rootCategory);
            $dm->persist($categoryYear);
        }
        if(!$categoryRegion = $dm->getRepository('CaravaneCoreBundle:Category')->find("/shop/categories/Région")) {
            $categoryRegion=new Category();
            $categoryRegion->setName('Région');
            $categoryRegion->setSlug('region');
            $categoryRegion->setTitle('Région');
            $categoryRegion->setParent($rootCategory);
            $dm->persist($categoryRegion);
        }

        $dm->flush();

        $c=0;
        foreach($products as $product) {

            if(!$documentProduct = $dm->getRepository('CaravaneShopBundle:Product')->findOneBy(array("reference"=>$product->Codevin))) {
                $documentProduct=new Product();
                $documentProduct->setReference($product->Codevin->__toString());
                $documentProduct->setSku($product->Codevin->__toString());
                $documentProduct->setParent($rootProduct);
                $documentProduct->setInsertDate(new \Datetime('now'));
            }

            $documentProduct->setName($product->Codevin->__toString());
            $documentProduct->setTitle($product->DesignationBD->__toString());
            $documentProduct->setDescription($product->Descriptif->__toString());
            $documentProduct->setMetaDescription($product->meta_description->__toString());
            $documentProduct->setMetaKeywords($product->meta_keywords->__toString());
            $documentProduct->setPrice(floatval($product->PrixVenteHT->__toString()));
            $documentProduct->setStock(100);

            $documentProduct->setAttributes(json_encode(array(
                "association"=>array(
                    "Aperitif"=>$product->Aperitif->__toString(),
                    "Asiatique"=>$product->Asiatique->__toString(),
                    "Barbecue"=>$product->Barbecue->__toString(),
                    "Canard"=>$product->Canard->__toString(),
                    "Charcuterie"=>$product->Charcuterie->__toString(),
                    "Coquillages"=>$product->Coquillages->__toString(),
                    "Dessert"=>$product->Dessert->__toString(),
                    "Epice"=>$product->Epice->__toString(),
                    "Fromage"=>$product->Fromage->__toString(),
                    "Gibier"=>$product->Gibier->__toString(),
                    "Mouton"=>$product->Mouton->__toString(),
                    "Poisson"=>$product->Poisson->__toString(),
                    "Salade"=>$product->Salade->__toString(),
                    "ViandeRouge"=>$product->ViandeRouge->__toString(),
                    "Volaille"=>$product->Volaille->__toString()
                )
            )));

            if($product->Couleur->__toString()!="") {
                if(!$category = $dm->getRepository('CaravaneCoreBundle:Category')->find("/shop/categories/Couleur/".$product->Couleur)) {
                    $category=new Category();
                    $name=$product->Couleur->__toString();
                    $category->setName($name);
                    $category->setSlug($name);
                    $category->setTitle($name);
                    $category->setParent($categoryColor);
                    $dm->persist($category);
                }
                $documentProduct->addCategory($category);
            }
            if($product->Appellation->__toString()!="") {
                if(!$category = $dm->getRepository('CaravaneCoreBundle:Category')->find("/shop/categories/Appellation/".$product->Appellation)) {
                    $category=new Category();
                    $name=$product->Appellation->__toString();
                    $category->setName($name);
                    $category->setSlug($name);
                    $category->setTitle($name);
                    $category->setParent($categoryAppellation);
                    $dm->persist($category);
                }
                $documentProduct->addCategory($category);
            }
            if($product->Annee->__toString()!="") {
                if(!$category = $dm->getRepository('CaravaneCoreBundle:Category')->find("/shop/categories/Année/".$product->Annee)) {
                    $category=new Category();
                    $name=$product->Annee->__toString();
                    $category->setName($name);
                    $category->setSlug($name);
                    $category->setTitle($name);
                    $category->setParent($categoryYear);
                    $dm->persist($category);
                }
                $documentProduct->addCategory($category);
            }
            if($product->Regions->__toString()!="") {
                if(!$category = $dm->getRepository('CaravaneCoreBundle:Category')->find("/shop/categories/Région/".$product->Regions)) {
                    $category=new Category();
                    $name=$product->Regions->__toString();
                    $category->setName($name);
                    $category->setSlug($name);
                    $category->setTitle($name);
                    $category->setParent($categoryRegion);
                    $dm->persist($category);
                }
                $documentProduct->addCategory($category);
            }


            //product



            $documentProduct->setUpdateDate(new \Datetime('now'));
            $dm->persist($documentProduct);
            echo $product->DesignationBD." - ".$product->Codevin."<br/>";
            $c++;
            if($c==10) {
                echo "-flushing<br/>";
                $dm->flush();
                $c=0;
            }
        }
        $dm->flush();

    }



}
<?php
namespace Caravane\Bundle\ShopBundle\Document;

use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;
use Doctrine\Common\Collections\ArrayCollection;
use Cocur\Slugify\Slugify;

use Caravane\Bundle\CoreBundle\Document\Category;
use Caravane\Bundle\ShopBundle\Document\Manufacturer;

/**
 * @PHPCR\Document(referenceable=true)
 */
class Product
{
    /**
     * @PHPCR\Id()
     */
    protected $id;

    /**
     * @PHPCR\Nodename
     */
    protected $name;


    /**
     * @PHPCR\String()
     */
    protected $title;

    /**
     * @PHPCR\String()
     */
    protected $sku;

    /**
     * @PHPCR\Float()
     */
    protected $price;

    /**
     * @PHPCR\String()
     */
    protected $reference;

    /**
     * @PHPCR\ReferenceOne(targetDocument="Caravane\Bundle\ShopBundle\Document\Manufacturer", cascade="persist", strategy="hard")
     */
    protected $provider;

    /**
     * @PHPCR\String()
     */
    protected $attributes;


    /**
     * @PHPCR\String()
     */
    protected $description;



    /**
     * @PHPCR\String()
     */
    protected $meta_description;

    /**
     * @PHPCR\String()
     */
    protected $meta_keywords;



    /**
     * @PHPCR\Long()
     */
    protected $stock;


    /**
     * @PHPCR\Date()
     */
    protected $insertDate;

    /**
     * @PHPCR\Date()
     */
    protected $updateDate;

    /**
     * @PHPCR\Boolean()
     */
    private $active = false;


    /**
     * @PHPCR\ReferenceMany(targetDocument="Caravane\Bundle\CoreBundle\Document\Category", cascade="persist", strategy="hard")
     */
    private $categories;


    /**
     * @PHPCR\ParentDocument()
     */
    protected $parent;



    public function setId($id)
    {
        $this->id = $id;
    }

    public function __construct()
    {
        $this->categories = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getChildren()
    {
        return $this->children;
    }

    public function getParent()
    {
        return $this->parent;
    }

    public function setParent($parent)
    {
        $this->parent = $parent;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getSlug()
    {
        return $this->slug;
    }

    public function setSlug($slug)
    {
        if(is_null($slug)) {
            $slugify = new Slugify();
            $slug=$slugify($this->title);
        }
        $this->slug = $slug;
    }

    public function getCageories() {
        return $this->categories;
    }

    public function addCategory(Category $category)
    {
        $this->categories[] = $category;
    }


    public function getSku()
    {
        return $this->sku;
    }

    public function setSku($sku)
    {
        $this->sku = $sku;
    }

    public function getReference()
    {
        return $this->reference;
    }

    public function setReference($reference)
    {
        $this->reference = $reference;
    }

    public function getProvider()
    {
        return $this->provider;
    }

    public function setProvider($provider)
    {
        $this->provider = $provider;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }


    public function getAttributes()
    {
        return $this->attributes;
    }

    public function setAttributes($attributes)
    {
        $this->attributes = $attributes;
    }


    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getMetaDescription()
    {
        return $this->meta_description;
    }

    public function setMetaDescription($meta_description)
    {
        $this->meta_description = $meta_description;
    }


    public function getMetaKeywords()
    {
        return $this->meta_keywords;
    }

    public function setMetaKeywords($meta_keywords)
    {
        $this->meta_keywords = $meta_keywords;
    }

    public function getInsertDate()
    {
        return $this->insertDate;
    }

    public function setInsertDate($insertDate)
    {
        $this->insertDate = $insertDate;
    }

    public function getUpdateDate()
    {
        return $this->updateDate;
    }

    public function setUpdateDate($updateDate)
    {
        $this->updateDate = $updateDate;
    }

    public function getActive()
    {
        return $this->active;
    }

    public function setActive($active)
    {
        $this->active = $active;
    }

    public function getStock()
    {
        return $this->stock;
    }

    public function setStock($stock)
    {
        $this->stock = $stock;
    }


}
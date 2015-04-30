<?php

namespace Caravane\Bundle\ShopBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use Caravane\Bundle\ShopBundle\Entity\Category;

/**
 * Product
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Caravane\ShopBundle\Entity\ProductRepository")
 */
class Product
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;


    /**
     * @var string
     *
     * @ORM\Column(name="sku", type="string", length=255)
     */
    private $sku;

    /**
     * @var string
     *
     * @ORM\Column(name="reference", type="string", length=255)
     */
    private $reference;

    /**
     * @var string
     *
     * @ORM\Column(name="provider", type="string", length=255)
     */
    private $provider;

    /**
     * @var integer
     *
     * @ORM\Column(name="price", type="integer")
     */
    private $price;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Category")
     */
    private $year;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Category")
     */
    private $color;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Category")
     */
    private $appellation;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Category")
     */
    private $region;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Category")
     */
    private $typicite;

    /**
     * @var string
     *
     * @ORM\Column(name="attributes", type="string", length=255)
     */
    private $attributes;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="$meta_description", type="text")
     */
    private $meta_description;

    /**
     * @var string
     *
     * @ORM\Column(name="meta_keywords", type="text")
     */
    private $meta_keywords;

    /**
     * @var datetime
     *
     * @ORM\Column(name="insertDate", type="datetime")
     */
    private $insertDate;

    /**
     * @var datetime
     *
     * @ORM\Column(name="updateDate", type="datetime")
     */
    private $updateDate;

    /**
     * @var boolean
     *
     * @ORM\Column(name="active", type="boolean")
     */
    private $active;

    /**
     * @var integer
     *
     * @ORM\Column(name="stock", type="integer")
     */
    private $stock;




    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Product
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set sku
     *
     * @param string $sku
     * @return Product
     */
    public function setSku($sku)
    {
        $this->sku = $sku;

        return $this;
    }

    /**
     * Get sku
     *
     * @return string 
     */
    public function getSku()
    {
        return $this->sku;
    }

    /**
     * Set reference
     *
     * @param string $reference
     * @return Product
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get reference
     *
     * @return string 
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set provider
     *
     * @param string $provider
     * @return Product
     */
    public function setProvider($provider)
    {
        $this->provider = $provider;

        return $this;
    }

    /**
     * Get provider
     *
     * @return string 
     */
    public function getProvider()
    {
        return $this->provider;
    }

    /**
     * Set price
     *
     * @param integer $price
     * @return Product
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return integer 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set attributes
     *
     * @param string $attributes
     * @return Product
     */
    public function setAttributes($attributes)
    {
        $this->attributes = $attributes;

        return $this;
    }

    /**
     * Get attributes
     *
     * @return string 
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Product
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set meta_description
     *
     * @param string $metaDescription
     * @return Product
     */
    public function setMetaDescription($metaDescription)
    {
        $this->meta_description = $metaDescription;

        return $this;
    }

    /**
     * Get meta_description
     *
     * @return string 
     */
    public function getMetaDescription()
    {
        return $this->meta_description;
    }

    /**
     * Set meta_keywords
     *
     * @param string $metaKeywords
     * @return Product
     */
    public function setMetaKeywords($metaKeywords)
    {
        $this->meta_keywords = $metaKeywords;

        return $this;
    }

    /**
     * Get meta_keywords
     *
     * @return string 
     */
    public function getMetaKeywords()
    {
        return $this->meta_keywords;
    }

    /**
     * Set insertDate
     *
     * @param \DateTime $insertDate
     * @return Product
     */
    public function setInsertDate($insertDate)
    {
        $this->insertDate = $insertDate;

        return $this;
    }

    /**
     * Get insertDate
     *
     * @return \DateTime 
     */
    public function getInsertDate()
    {
        return $this->insertDate;
    }

    /**
     * Set updateDate
     *
     * @param \DateTime $updateDate
     * @return Product
     */
    public function setUpdateDate($updateDate)
    {
        $this->updateDate = $updateDate;

        return $this;
    }

    /**
     * Get updateDate
     *
     * @return \DateTime 
     */
    public function getUpdateDate()
    {
        return $this->updateDate;
    }

    /**
     * Set active
     *
     * @param boolean $active
     * @return Product
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean 
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set stock
     *
     * @param integer $stock
     * @return Product
     */
    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this;
    }

    /**
     * Get stock
     *
     * @return integer 
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Set year
     *
     * @param \Caravane\ShopBundle\Entity\CaravaneShopBundle:Category $year
     * @return Product
     */
    public function setYear(Category $year = null)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get year
     *
     * @return \Caravane\ShopBundle\Entity\CaravaneShopBundle:Category 
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set color
     *
     * @param \Caravane\ShopBundle\Entity\CaravaneShopBundle:Category $color
     * @return Product
     */
    public function setColor(Category $color = null)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return \Caravane\ShopBundle\Entity\CaravaneShopBundle:Category 
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set appellation
     *
     * @param \Caravane\ShopBundle\Entity\CaravaneShopBundle:Category $appellation
     * @return Product
     */
    public function setAppellation(Category $appellation = null)
    {
        $this->appellation = $appellation;

        return $this;
    }

    /**
     * Get appellation
     *
     * @return \Caravane\ShopBundle\Entity\CaravaneShopBundle:Category 
     */
    public function getAppellation()
    {
        return $this->appellation;
    }

    /**
     * Set region
     *
     * @param \Caravane\ShopBundle\Entity\CaravaneShopBundle:Category $region
     * @return Product
     */
    public function setRegion(Category $region = null)
    {
        $this->region = $region;

        return $this;
    }

    /**
     * Get region
     *
     * @return \Caravane\ShopBundle\Entity\CaravaneShopBundle:Category 
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * Set typicite
     *
     * @param \Caravane\ShopBundle\Entity\CaravaneShopBundle:Category $typicite
     * @return Product
     */
    public function setTypicite(Category $typicite = null)
    {
        $this->typicite = $typicite;

        return $this;
    }

    /**
     * Get typicite
     *
     * @return \Caravane\ShopBundle\Entity\CaravaneShopBundle:Category 
     */
    public function getTypicite()
    {
        return $this->typicite;
    }
}

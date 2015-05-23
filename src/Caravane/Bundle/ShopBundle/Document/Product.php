<?php
namespace Caravane\Bundle\ShopBundle\Document;

use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;
use Doctrine\Common\Collections\ArrayCollection;

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
    protected $sku;

    /**
     * @PHPCR\String()
     */
    protected $reference;

    /**
     * @PHPCR\ReferenceOne(targetDocument="Manufacturer", cascade="persist", strategy="hard")
     */
    protected $provider;


    /**
     * @PHPCR\String()
     */
    protected $description;

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
    public function setParent($parent)
    {
        $this->parent = $parent;
    }
    public function setName($name)
    {
        $this->name = $name;
    }

    public function getCageories() {
        return $this->categories;
    }

    public function addCategory(Category $category)
    {
        $this->categories[] = $category;
    }
}
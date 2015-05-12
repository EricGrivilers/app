<?php
namespace Caravane\Bundle\ShopBundle\Document;

use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;
use Caravane\Bundle\ShopBundle\Document\Category;


/**
 * @PHPCR\Document(repositoryClass="Caravane\Bundle\ShopBundle\Repository\CategoryRepository")
 */
class Category
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
    protected $description;

    /**
     * @PHPCR\Boolean()
     */
    protected $active = false;

    /**
     * @PHPCR\Children(filter="a*", fetchDepth=3)
     */
    protected $children;

    /**
     * @PHPCR\ParentDocument()
     */
    protected $parent;



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

    public function getParent()
    {
        return  $this->parent;
    }


    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getDescription()
    {
        return  $this->description;
    }

    public function setActive($active)
    {
        $this->active = $active;
    }

    public function getActive()
    {
        return $this->active;
    }
}
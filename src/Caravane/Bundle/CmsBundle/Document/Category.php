<?php
namespace Caravane\Bundle\CmsBundle\Document;

use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;
use Caravane\Bundle\CmsBundle\Document\Category;


/**
 * @PHPCR\Document()
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
     * @Children(filter="a*", fetchDepth=3)
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
}
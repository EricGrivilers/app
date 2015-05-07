<?php
namespace Caravane\Bundle\CmsBundle\Document;

use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;
use Doctrine\Common\Collections\ArrayCollection;
use Cocur\Slugify\Slugify;

use Caravane\Bundle\CmsBundle\Document\Category;

/**
* @PHPCR\Document()
*/
class Page
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
    protected $slug;



    /**
     * @PHPCR\Boolean()
     */
    private $active = false;


    /**
     * @PHPCR\ReferenceMany(targetDocument="Category", cascade="persist", strategy="hard")
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
}
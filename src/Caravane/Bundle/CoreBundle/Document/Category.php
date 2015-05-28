<?php
namespace Caravane\Bundle\CoreBundle\Document;

use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;
use Doctrine\Common\Collections\ArrayCollection;
use Knp\Menu\NodeInterface;
use Cocur\Slugify\Slugify;



/**
* @PHPCR\Document(referenceable=true)
*/
class Category implements NodeInterface
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
     * @PHPCR\Children()
     */
    protected $children;

    /**
     * @PHPCR\ParentDocument()
     */
    protected $parent;



    public function setId($id)
    {
        $this->id = $id;
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

    public function getOptions()
    {
        return array(
            'label' => $this->title,
            'content' => $this,

            'attributes'         => array(),
            'childrenAttributes' => array(),
            'displayChildren'    => true,
            'linkAttributes'     => array("href"=>"bbb"),
            'labelAttributes'    => array("href"=>"ccc"),
        );
    }


    public function getUri() {
        return "eeeeeeeee";
    }
}
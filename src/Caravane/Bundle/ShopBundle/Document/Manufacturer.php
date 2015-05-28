<?php
namespace Caravane\Bundle\ShopBundle\Document;

use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;
use Caravane\Bundle\ShopBundle\Document\Category;

/**
 * @PHPCR\Document(referenceable=true)
 */
class Manufacturer
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


    public function getId()
    {
        return $this->id;
    }


    public function setName($name)
    {
        $this->name = $name;
    }
}
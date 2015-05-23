<?php
namespace Caravane\Bunlde\ShopBundle\Document;

use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;
use Caravane\Bundle\CmsBundle\Document\Page;

/**
 * @PHPCR\Document()
 */
class Shop
{
    /**
     * @PHPCR\Id()
     */
    protected $id;

    /**
     * @PHPCR\ReferenceOne(targetDocument="Caravane\Bundle\CmsBundle\Document\Page")
     */
    protected $homepage;

    public function getHomepage()
    {
        return $this->homepage;
    }

    public function setHomepage($homepage)
    {
        $this->homepage = $homepage;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
}
<?php

namespace Caravane\Bundle\ShopBundle\Document;

use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;

/**
 * @PHPCR\Document()
 */
class Shop {
    /**
     * @PHPCR\Id()
     */
    protected $id;

    /**
     * @PHPCR\ReferenceOne(targetDocument="Caravane\Bundle\CmsBundle\Document\Page")
     */
    protected $homepage;

    public function getHomepage() {
        return $this->homepage;
    }

    public function setHomepage($homepage) {
        $this->homepage = $homepage;
    }

    public function setId($id) {
        $this->id = $id;
    }
}
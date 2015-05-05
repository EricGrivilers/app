<?php
namespace Caravane\Bundle\CmsBundle\Document;

use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;

/**
* @PHPCR\Document()
*/
class Page
{
    /**
    * @PHPCR\Id()
    */
    protected $id;



    public function setId($id)
    {
        $this->id = $id;
    }
}
<?php
namespace Caravane\Bundle\ShopBundle\Document;

use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;
use Doctrine\Common\Collections\ArrayCollection;
use Cocur\Slugify\Slugify;

use Caravane\Bundle\CoreBundle\Document\Category as BaseCategory;


/**
 * @PHPCR\Document(referenceable=true)
 */
class Category extends BaseCategory
{



}
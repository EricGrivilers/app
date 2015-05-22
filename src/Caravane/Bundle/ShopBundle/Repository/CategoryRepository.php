<?php

namespace Caravane\Bundle\ShopBundle\Repository;


use Doctrine\ODM\PHPCR\DocumentRepository;


class CategoryRepository extends DocumentRepository {

    function getTree() {

        $qb = $this->dm->createQueryBuilder();
        $qb->from()->document('Caravane\Bundle\ShopBundle\Document\Category', 'u');
        return $qb;
    }
}
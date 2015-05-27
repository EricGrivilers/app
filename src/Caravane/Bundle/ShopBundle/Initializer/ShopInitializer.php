<?php

namespace Caravane\Bundle\ShopBundle\Initializer;

use Doctrine\Bundle\PHPCRBundle\Initializer\InitializerInterface;
use PHPCR\Util\NodeHelper;
use Doctrine\Bundle\PHPCRBundle\ManagerRegistry;
use Caravane\Bundle\ShopBundle\Document\Shop;

class ShopInitializer implements InitializerInterface
{
    private $basePath;

    public function __construct($basePath = '/shop') {
        $this->basePath = $basePath;
    }

    public function init(ManagerRegistry $registry)
    {
        $dm = $registry->getManager();
        if ($dm->find(null, $this->basePath)) {
            return;
        }

        $shop = new Shop();
        $shop->setId($this->basePath);
        $dm->persist($shop);
        $dm->flush();

        $session = $registry->getConnection();

        // create the 'cms', 'pages', and 'posts' nodes
        NodeHelper::createPath($session, $this->basePath . '/products');
        NodeHelper::createPath($session, $this->basePath . '/manufacturers');
        NodeHelper::createPath($session, $this->basePath . '/categories');

        $session->save();
    }

    public function getName()
    {
        return 'caravane_shop_shop_initializer';
    }
}
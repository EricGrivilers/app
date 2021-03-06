<?php

namespace Caravane\Bundle\CmsBundle\Initializer;

use Doctrine\Bundle\PHPCRBundle\Initializer\InitializerInterface;
use PHPCR\Util\NodeHelper;
use Doctrine\Bundle\PHPCRBundle\ManagerRegistry;
use Caravane\Bundle\CmsBundle\Document\Site;

class SiteInitializer implements InitializerInterface
{
    private $basePath;

    public function __construct($basePath = '/cms') {
        $this->basePath = $basePath;
    }

    public function init(ManagerRegistry $registry)
    {
        $dm = $registry->getManager();
        if ($dm->find(null, $this->basePath)) {
            return;
        }

        $site = new Site();
        $site->setId($this->basePath);
        $dm->persist($site);
        $dm->flush();

        $session = $registry->getConnection();

        // create the 'cms', 'pages', and 'posts' nodes
        NodeHelper::createPath($session, $this->basePath . '/pages');
        NodeHelper::createPath($session, $this->basePath . '/posts');
        NodeHelper::createPath($session, $this->basePath . '/routes');
        NodeHelper::createPath($session, $this->basePath . '/categories');

        $session->save();
    }

    public function getName()
    {
        return 'caravane_cms_site_initializer';
    }
}
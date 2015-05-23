<?php

namespace Caravane\Bundle\CmsBundle\DataFixtures\PHPCR;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ODM\PHPCR\DocumentManager;
use Caravane\Bundle\CmsBundle\Document\Page;

class LoadPageData implements FixtureInterface
{
    public function load(ObjectManager $dm)
    {
        if (!$dm instanceof DocumentManager) {
            $class = get_class($dm);
            throw new \RuntimeException("Fixture requires a PHPCR ODM DocumentManager instance, instance of '$class' given.");
        }

        $parent = $dm->find(null, '/cms/pages');

        $rootPage = new Page();
        $rootPage->setName('root');
        $rootPage->setSlug('root');
        $rootPage->setTitle('root');
        $rootPage->setParent($parent);
        $dm->persist($rootPage);

        $homepage = new Page();
        $homepage->setName('home');
        $homepage->setSlug('home');
        $homepage->setTitle('Home');
        $homepage->setParent($rootPage);
        $dm->persist($homepage);

        $about = new Page();
        $about->setName('about');
        $about->setSlug('about');
        $about->setTitle('About');
        $about->setParent($rootPage);
        $dm->persist($about);

        $dm->flush();
    }
}
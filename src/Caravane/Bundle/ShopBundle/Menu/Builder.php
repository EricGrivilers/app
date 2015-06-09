<?php



namespace Caravane\Bundle\ShopBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

use Symfony\Cmf\Bundle\MenuBundle\Doctrine\Phpcr\MenuNode;
use Symfony\Cmf\Bundle\MenuBundle\Doctrine\Phpcr\Menu;
use PHPCR\Util\NodeHelper;

class Builder extends ContainerAware
{
    public function categoriesMenu(FactoryInterface $factory, array $options)
    {
        $dm = $this->container->get('doctrine_phpcr')->getManager();
        $categories = $dm->getRepository('CaravaneCoreBundle:Category')->find("/shop/categories");
        //$factory = new \Knp\Menu\MenuFactory();
        $menu = $factory->createFromNode($categories);
        $menu->setChildrenAttribute('class', 'nav navbar-nav');

        return $menu;
    }
}
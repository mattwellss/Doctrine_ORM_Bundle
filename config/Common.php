<?php
namespace Mattwellss\Doctrine_Bundle\Config;

use Aura\Di\Container;
use Aura\Di\ContainerConfig;

use Doctrine\ORM\EntityManager;

class Common extends ContainerConfig
{
    public function define(Container $di)
    {
        $di->set('doctrine/orm:entity-manager',
            $di->lazy(function () use($di) {
                return EntityManager::create(
                    (array)$di->get('doctrine/orm:connection-settings'),
                    $di->get('doctrine/orm:config'));
            })
        );
    }

    public function modify(Container $di)
    {
    }
}

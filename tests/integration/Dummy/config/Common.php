<?php

namespace Mattwellss\Dummy\Config;

use Aura\Di\Container;
use Aura\Di\ContainerConfig;

use Doctrine\ORM\Tools\Setup;

class Common extends ContainerConfig
{
    public function define(Container $di)
    {
        $di->set('doctrine/orm:connection-settings', new \ArrayObject([
            'driver' => 'pdo_sqlite',
            'path' => ':memory:'
        ]));

        $di->set('doctrine/orm:config', Setup::createAnnotationMetadataConfiguration(
            [__DIR__ . '/../mapping/'], true
        ));
    }

    public function modify(Container $di)
    {
    }
}

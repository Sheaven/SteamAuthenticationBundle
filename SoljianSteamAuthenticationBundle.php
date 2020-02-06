<?php

namespace Soljian\SteamAuthenticationBundle;

use Soljian\SteamAuthenticationBundle\Security\Factory\SteamFactory;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * @author Soljian
 */
class SoljianSteamAuthenticationBundle extends Bundle
{
    /**
     * {@inheritdoc}
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $extension = $container->getExtension('security');
        $extension->addSecurityListenerFactory(new SteamFactory());
    }
}
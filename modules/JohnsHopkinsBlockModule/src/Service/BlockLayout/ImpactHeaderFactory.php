<?php

namespace JohnsHopkinsBlockModule\Service\BlockLayout;

use JohnsHopkinsBlockModule\Site\BlockLayout\ImpactHeader;
use Laminas\ServiceManager\Factory\FactoryInterface;
use Psr\Container\ContainerInterface;

class ImpactHeaderFactory implements FactoryInterface
{

  /**
   * @inheritDoc
   */
  public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null) {
    return new ImpactHeader($container->get('FormElementManager'));
  }
}
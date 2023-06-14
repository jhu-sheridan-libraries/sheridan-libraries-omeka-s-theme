<?php

namespace JohnsHopkinsBlockModule\Service\BlockLayout;

use JohnsHopkinsBlockModule\Site\BlockLayout\FeaturedDisplay;
use Laminas\ServiceManager\Factory\FactoryInterface;
use Psr\Container\ContainerInterface;

class FeaturedDisplayFactory implements FactoryInterface
{

  /**
   * @inheritDoc
   */
  public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null) {
    return new FeaturedDisplay($container->get('FormElementManager'));
  }
}
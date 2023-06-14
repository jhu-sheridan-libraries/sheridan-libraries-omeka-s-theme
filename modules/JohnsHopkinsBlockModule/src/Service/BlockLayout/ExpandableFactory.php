<?php

namespace JohnsHopkinsBlockModule\Service\BlockLayout;

use JohnsHopkinsBlockModule\Site\BlockLayout\Expandable;
use Laminas\ServiceManager\Factory\FactoryInterface;
use Psr\Container\ContainerInterface;

class ExpandableFactory implements FactoryInterface
{

  /**
   * @inheritDoc
   */
  public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null) {
    return new Expandable($container->get('FormElementManager'));
  }
}
<?php

namespace JohnsHopkinsBlockModule\Service\BlockLayout;

use JohnsHopkinsBlockModule\Site\BlockLayout\PullQuote;
use Laminas\ServiceManager\Factory\FactoryInterface;
use Psr\Container\ContainerInterface;

class PullQuoteFactory implements FactoryInterface
{

  /**
   * @inheritDoc
   */
  public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null) {
    return new PullQuote($container->get('FormElementManager'));
  }
}
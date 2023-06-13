<?php

namespace JohnsHopkinsBlockModule;

use Omeka\Module\AbstractModule;

class Module extends AbstractModule
{
  /**
   * Get this module's configuration array.
   *
   * @return array
   */
  public function getConfig()
  {
    return include __DIR__ . '/config/module.config.php';
  }
}
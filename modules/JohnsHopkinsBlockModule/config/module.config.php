<?php

namespace JohnsHopkinsBlockModule;

return [
  'view_manager' => [
    'template_path_stack' => [
      dirname(__DIR__) . '/view',
    ]
  ],
  'block_layouts' => [
    'factories' => [
      'impact-header' => Service\BlockLayout\ImpactHeaderFactory::class,
    ],
  ],
  'form_elements' => [
    'invokables' => [
      Form\ImpactHeaderForm::class => Form\ImpactHeaderForm::class,
    ],
  ],
];
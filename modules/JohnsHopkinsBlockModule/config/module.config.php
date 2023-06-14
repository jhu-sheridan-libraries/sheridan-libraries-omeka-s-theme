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
      'expandable' => Service\BlockLayout\ExpandableFactory::class,
      'pull-quote' => Service\BlockLayout\PullQuoteFactory::class,
      'featured-display' => Service\BlockLayout\FeaturedDisplayFactory::class,
    ],
  ],
  'form_elements' => [
    'invokables' => [
      Form\ImpactHeaderForm::class => Form\ImpactHeaderForm::class,
      Form\ExpandableForm::class => Form\ExpandableForm::class,
      Form\PullQuoteForm::class => Form\PullQuoteForm::class,
      Form\FeaturedDisplayForm::class => Form\FeaturedDisplayForm::class,
    ],
  ],
];
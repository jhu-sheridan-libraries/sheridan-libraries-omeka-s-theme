<?php

namespace JohnsHopkinsBlockModule\Form;

use Laminas\Form\Element\Url;
use Laminas\Form\Element\Textarea;
use Laminas\Form\Element\Text;
use Laminas\Form\Element\Select;
use Laminas\Form\Fieldset;
use Omeka\Form\Element\Asset;

class ImpactHeaderForm extends Fieldset {

  public function init()
  {
    $this->add([
      'name' => 'o:block[__blockIndex__][o:data][image]',
      'type' => Asset::class,
      'options' => [
        'label' => 'Image', // @translate
      ],
      ])
      ->add([
        'name' => 'o:block[__blockIndex__][o:data][heading]',
        'type' => Text::class,
        'options' => [
          'label' => 'Heading', // @translate
        ]
      ])
      ->add([
        'name' => 'o:block[__blockIndex__][o:data][heading_size]',
        'type' => Select::class,
        'options' => [
            'label' => 'Heading Size', // @translate
            'value_options' => [
                'h1' => 'H1 - select when this is the first block',  // @translate
                'h2' => 'H2 - select if this is not the first block', // @translate
            ],
        ],
      ])
      ->add([
        'name' => 'o:block[__blockIndex__][o:data][description]',
        'type' => Textarea::class,
        'options' => [
          'label' => 'Description', // @translate
        ],
        'attributes' => [
          'class' => 'wysiwyg',
        ],
      ])
    ;
  }

}
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
      /*->add([
        'name' => 'o:block[__blockIndex__][o:data][link]',
        'type' => Url::class,
        'options' => [
          'label' => 'Link URL', // @translate
        ],
      ])*/
      ->add([
        'name' => 'o:block[__blockIndex__][o:data][heading]',
        'type' => Text::class,
        'options' => [
          'label' => 'Link Text', // @translate
        ]
      ])
      ->add([
        'name' => 'o:block[__blockIndex__][o:data][heading_size]',
        'type' => Select::class,
        'options' => [
            'label' => 'Heading Size',
            'value_options' => [
                'h1' => 'h1',
                'h2' => 'h2',
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
<?php

namespace JohnsHopkinsBlockModule\Form;

use Laminas\Form\Element\Textarea;
use Laminas\Form\Element\Text;
use Laminas\Form\Fieldset;
use Laminas\Form\Element\Select;

class FeaturedDisplayForm extends Fieldset {

  public function init()
  {
    $this
      ->add([
        'name' => 'o:block[__blockIndex__][o:data][heading]',
        'type' => Text::class,
        'options' => [
          'label' => 'Heading', // @translate
          'description' => 'test',
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
      ->add([
        'name' => 'o:block[__blockIndex__][o:data][layout]',
        'type' => Select::class,
        'options' => [
            'label' => 'Media Placement',
            'value_options' => [
                'image-left' => 'Left',
                'image-right' => 'Right',
            ],
        ],
      ])
    ;
  }

}
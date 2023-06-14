<?php

namespace JohnsHopkinsBlockModule\Form;

use Laminas\Form\Element\Textarea;
use Laminas\Form\Element\Text;
use Laminas\Form\Fieldset;

class ExpandableForm extends Fieldset {

  public function init()
  {
    $this->add([
        'name' => 'o:block[__blockIndex__][o:data][heading]',
        'type' => Text::class,
        'options' => [
          'label' => 'Heading', // @translate
        ]
      ])
      ->add([
        'name' => 'o:block[__blockIndex__][o:data][description]',
        'type' => Textarea::class,
        'options' => [
          'label' => 'Content', // @translate
        ],
        'attributes' => [
          'class' => 'wysiwyg',
        ],
      ])
    ;
  }

}
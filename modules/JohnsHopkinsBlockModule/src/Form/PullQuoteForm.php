<?php

namespace JohnsHopkinsBlockModule\Form;

use Laminas\Form\Element\Textarea;
use Laminas\Form\Element\Text;
use Laminas\Form\Fieldset;

class PullQuoteForm extends Fieldset {

  public function init()
  {
    $this->add([
        'name' => 'o:block[__blockIndex__][o:data][quote]',
        'type' => Textarea::class,
        'options' => [
          'label' => 'Quote', // @translate
        ],
      ])
      ->add([
        'name' => 'o:block[__blockIndex__][o:data][author]',
        'type' => Text::class,
        'options' => [
          'label' => 'Author', // @translate
        ]
      ])
      ->add([
        'name' => 'o:block[__blockIndex__][o:data][subtext]',
        'type' => Text::class,
        'options' => [
          'label' => 'Author Subtext', // @translate
        ]
      ])
    ;
  }

}
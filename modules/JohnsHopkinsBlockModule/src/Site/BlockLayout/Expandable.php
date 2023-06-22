<?php

namespace JohnsHopkinsBlockModule\Site\BlockLayout;

use JohnsHopkinsBlockModule\Form\ExpandableForm;
use Laminas\Form\FormElementManager;
use Laminas\View\Renderer\PhpRenderer;
use Omeka\Api\Representation\SitePageBlockRepresentation;
use Omeka\Api\Representation\SitePageRepresentation;
use Omeka\Api\Representation\SiteRepresentation;
use Omeka\Site\BlockLayout\AbstractBlockLayout;

class Expandable extends AbstractBlockLayout {

  /**
   * @var FormElementManager
   */
  protected $formElementManager;

  /**
   * @param FormElementManager $formElementManager
   */
  public function __construct(FormElementManager $formElementManager)
  {
    $this->formElementManager = $formElementManager;
  }

  /**
   * @inheritDoc
   */
  public function getLabel() {
    return 'JH Custom Block - Expandable'; // @translate
  }

  /**
   * @inheritDoc
   */
  public function form(PhpRenderer $view, SiteRepresentation $site, SitePageRepresentation $page = null, SitePageBlockRepresentation $block = null) {
    $form = $this->formElementManager->get(ExpandableForm::class);

    if ($block && $block->data()) {
      $form->populateValues([
        'o:block[__blockIndex__][o:data][heading]' => $block->dataValue('heading'),
        'o:block[__blockIndex__][o:data][description]' => $block->dataValue('description'),
      ]);
    }

    return $view->formCollection($form);
  }

  /**
   * @inheritDoc
   */
  public function render(PhpRenderer $view, SitePageBlockRepresentation $block) {

    return $view->partial('common/block-layout/expandable', [
      'heading' => $block->dataValue('heading'),
      'description' => $block->dataValue('description'),
    ]);
  }
}
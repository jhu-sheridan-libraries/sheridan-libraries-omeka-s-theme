<?php

namespace JohnsHopkinsBlockModule\Site\BlockLayout;

use JohnsHopkinsBlockModule\Form\ImpactHeaderForm;
use Laminas\Form\FormElementManager;
use Laminas\View\Renderer\PhpRenderer;
use Omeka\Api\Representation\SitePageBlockRepresentation;
use Omeka\Api\Representation\SitePageRepresentation;
use Omeka\Api\Representation\SiteRepresentation;
use Omeka\Site\BlockLayout\AbstractBlockLayout;

class ImpactHeader extends AbstractBlockLayout {

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
    return 'Impact Header'; // @translate
  }

  /**
   * @inheritDoc
   */
  public function form(PhpRenderer $view, SiteRepresentation $site, SitePageRepresentation $page = null, SitePageBlockRepresentation $block = null) {
    $form = $this->formElementManager->get(ImpactHeaderForm::class);

    if ($block && $block->data()) {
      $form->populateValues([
        'o:block[__blockIndex__][o:data][image]' => $block->dataValue('image'),
        //'o:block[__blockIndex__][o:data][link]' => $block->dataValue('link'),
        'o:block[__blockIndex__][o:data][heading]' => $block->dataValue('heading'),
        'o:block[__blockIndex__][o:data][heading_size]' => $block->dataValue('heading_size'),
        'o:block[__blockIndex__][o:data][description]' => $block->dataValue('description'),
      ]);
    }

    return $view->formCollection($form);
  }

  /**
   * @inheritDoc
   */
  public function render(PhpRenderer $view, SitePageBlockRepresentation $block) {
    $imageID = $block->dataValue('image');
    $image = null;
    if($imageID) {
      $image = $view->api()->read('assets', ['id' => $imageID])->getContent();
    }
    

    return $view->partial('common/block-layout/impact-header', [
      'image' => $image,
      //'link' => $block->dataValue('link'),
      'heading' => $block->dataValue('heading'),
      'heading_size' => $block->dataValue('heading_size'),
      'description' => $block->dataValue('description'),
    ]);
  }
}
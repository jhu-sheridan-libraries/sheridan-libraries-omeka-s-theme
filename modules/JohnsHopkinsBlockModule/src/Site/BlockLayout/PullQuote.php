<?php

namespace JohnsHopkinsBlockModule\Site\BlockLayout;

use JohnsHopkinsBlockModule\Form\PullQuoteForm;
use Laminas\Form\FormElementManager;
use Laminas\View\Renderer\PhpRenderer;
use Omeka\Api\Representation\SitePageBlockRepresentation;
use Omeka\Api\Representation\SitePageRepresentation;
use Omeka\Api\Representation\SiteRepresentation;
use Omeka\Site\BlockLayout\AbstractBlockLayout;

class PullQuote extends AbstractBlockLayout {

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
    return 'JH Custom Block - Pull Quote'; // @translate
  }

  /**
   * @inheritDoc
   */
  public function form(PhpRenderer $view, SiteRepresentation $site, SitePageRepresentation $page = null, SitePageBlockRepresentation $block = null) {
    $form = $this->formElementManager->get(PullQuoteForm::class);

    if ($block && $block->data()) {
      $form->populateValues([
        'o:block[__blockIndex__][o:data][quote]' => $block->dataValue('quote'),
        'o:block[__blockIndex__][o:data][author]' => $block->dataValue('author'),
        'o:block[__blockIndex__][o:data][subtext]' => $block->dataValue('subtext'),
        'o:block[__blockIndex__][o:data][layout]' => $block->dataValue('layout'),
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
    

    return $view->partial('common/block-layout/pull-quote', [
      'quote' => $block->dataValue('quote'),
      'author' => $block->dataValue('author'),
      'subtext' => $block->dataValue('subtext'),
      'layout' => $block->dataValue('layout'),
    ]);
  }
}
<?php

namespace JohnsHopkinsBlockModule\Site\BlockLayout;

use JohnsHopkinsBlockModule\Form\FeaturedDisplayForm;
use Laminas\Form\FormElementManager;
use Laminas\View\Renderer\PhpRenderer;
use Omeka\Api\Representation\SitePageBlockRepresentation;
use Omeka\Api\Representation\SitePageRepresentation;
use Omeka\Api\Representation\SiteRepresentation;
use Omeka\Site\BlockLayout\AbstractBlockLayout;

class FeaturedDisplay extends AbstractBlockLayout
{

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

    public function getLabel()
    {
        return 'JH Custom Block - Featured Display'; // @translate
    }

    public function form(PhpRenderer $view, SiteRepresentation $site,
        SitePageRepresentation $page = null, SitePageBlockRepresentation $block = null
    ) {
        $html = '';

        $form = $this->formElementManager->get(FeaturedDisplayForm::class);

        if ($block && $block->data()) {
          $form->populateValues([
            'o:block[__blockIndex__][o:data][heading]' => $block->dataValue('heading'),
            'o:block[__blockIndex__][o:data][description]' => $block->dataValue('description'),
            'o:block[__blockIndex__][o:data][layout]' => $block->dataValue('layout'),
          ]);
        }
    
        $html .= $view->formCollection($form);
        $html .= $view->blockAttachmentsForm($block);

        return $html;
    }

    public function render(PhpRenderer $view, SitePageBlockRepresentation $block)
    {
        $attachments = $block->attachments();

        return $view->partial('common/block-layout/featured-display', [
            'block' => $block,
            'attachments' => $attachments,
            'thumbnailType' => 'large',
            'showTitleOption' => true,
            'heading' => $block->dataValue('heading'),
            'description' => $block->dataValue('description'),
            'layout' => $block->dataValue('layout'),
        ]);
    }
}

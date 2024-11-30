<?php

declare(strict_types=1);

/*
 * This file is part of Contao bxSlider Bundle.
 *
 * (c) Hamid Peywasti 2024 <hamid@respinar.com>
 *
 * @license MIT
 */

namespace Respinar\ContaoTocBundle\Controller\FrontendModule;

use Contao\CoreBundle\Controller\FrontendModule\AbstractFrontendModuleController;
use Contao\CoreBundle\DependencyInjection\Attribute\AsFrontendModule;
use Contao\CoreBundle\Twig\FragmentTemplate;
use Contao\ModuleModel;
use Contao\StringUtil;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

#[AsFrontendModule(category: 'miscellaneous')]
class TableOfContentsController extends AbstractFrontendModuleController
{
    protected function getResponse(FragmentTemplate $template, ModuleModel $model, Request $request): Response
    {
        $arrSelector = StringUtil::deserialize($model->toc_articleSelector);

        $selectorType = $arrSelector['unit'] ?? "id";
        $articleSelector = $arrSelector['value'] ?? "main";

        $template->set('toc_headline', $model->toc_headline);
        $template->set('selectorType', $selectorType);
        $template->set('articleSelector', $articleSelector);
        $template->set('headingSelector', $model->toc_headingSelector);
    
        // $GLOBALS['TL_CSS'][] = 'bundles/respinarcontaotoc/css/toc.css';
        $GLOBALS['TL_JAVASCRIPT'][] = 'bundles/respinarcontaotoc/js/toc.js';

        return $template->getResponse();
    }
}

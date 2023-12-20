<?php

declare(strict_types=1);

/*
 * This file is part of Contao Table of Contents Bundle.
 *
 * (c) Hamid Peywasti 2023 <hamid@respinar.com>
 *
 * @license MIT
 */

namespace Respinar\ContaoTocBundle\Controller\ContentElement;

use Contao\ContentModel;
use Contao\CoreBundle\Controller\ContentElement\AbstractContentElementController;
use Contao\CoreBundle\DependencyInjection\Attribute\AsContentElement;
use Contao\StringUtil;
use Contao\System;
use Contao\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

#[AsContentElement(category: 'includes', template: 'ce_table_of_contents')]
class TableOfContentsController extends AbstractContentElementController
{
    protected function getResponse(Template $template, ContentModel $model, Request $request): Response
    {

        $arrSelector = StringUtil::deserialize($model->toc_articleSelector);

        $selectorType = $arrSelector['unit'];
        $articleSelector = $arrSelector['value'];

        if ($articleSelector == '') {
            $selectorType = 'id';
            $articleSelector = 'main';
        }

        $arrHeadline = StringUtil::deserialize($model->headline);

        $template->tocTitle = $arrHeadline['value'];
        $template->selectorType = $selectorType;
        $template->articleSelector = $articleSelector;
        $template->headingSelector = $model->toc_headingSelector;

        $request = System::getContainer()->get('request_stack')->getCurrentRequest();

		if ($request && System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest($request))
		{

			$template->setName('be_table_of_contents');

			return $template->getResponse();
		}

        $GLOBALS['TL_HEAD'][] = Template::generateScriptTag('bundles/respinarcontaotoc/js/toc.js', false, null);
        $GLOBALS['TL_HEAD'][] = Template::generateStyleTag('bundles/respinarcontaotoc/css/toc.css', false, null);

        return $template->getResponse();
    }
}

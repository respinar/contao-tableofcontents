<?php

declare(strict_types=1);

/*
 * This file is part of Contao Table of Contents Bundle.
 *
 * (c) Hamid Peywasti 2024 <hamid@respinar.com>
 *
 * @license MIT
 */

namespace Respinar\ContaoTocBundle\Controller\ContentElement;

use Contao\ContentModel;
use Contao\CoreBundle\Controller\ContentElement\AbstractContentElementController;
use Contao\CoreBundle\DependencyInjection\Attribute\AsContentElement;
use Contao\CoreBundle\Twig\FragmentTemplate;
use Contao\StringUtil;
use Contao\System;
use Contao\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

#[AsContentElement(category: 'includes')]
class TableOfContentsController extends AbstractContentElementController
{
    protected function getResponse(FragmentTemplate $template, ContentModel $model, Request $request): Response
    {

        $arrSelector = StringUtil::deserialize($model->toc_articleSelector);

        $selectorType = $arrSelector['unit'] ?? "id";
        $articleSelector = $arrSelector['value'] ?? "main";

        $template->set('selectorType', $selectorType);
        $template->set('articleSelector', $articleSelector);
        $template->set('headingSelector', $model->toc_headingSelector);

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

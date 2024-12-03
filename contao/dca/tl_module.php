<?php

declare(strict_types=1);

use Contao\Controller;
use Contao\System;

Controller::loadDataContainer('tl_content');
System::loadLanguageFile('tl_content');

$GLOBALS['TL_DCA']['tl_module']['palettes']['table_of_contents'] = '
    {type_legend},name,type;
    {toc_legend},toc_headline,toc_articleSelector,toc_headingSelector;
    {template_legend:hide},customTpl;
    {protected_legend:hide},protected;
    {expert_legend:hide},guests,cssID
';

$GLOBALS['TL_DCA']['tl_module']['fields']['toc_headline'] = &$GLOBALS['TL_DCA']['tl_content']['fields']['toc_headline'];
$GLOBALS['TL_DCA']['tl_module']['fields']['toc_articleSelector'] = &$GLOBALS['TL_DCA']['tl_content']['fields']['toc_articleSelector'];
$GLOBALS['TL_DCA']['tl_module']['fields']['toc_headingSelector'] = &$GLOBALS['TL_DCA']['tl_content']['fields']['toc_headingSelector'];
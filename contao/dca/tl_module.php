<?php

declare(strict_types=1);

$GLOBALS['TL_DCA']['tl_module']['palettes']['table_of_contents'] = '
    {type_legend},name,headline,type;
    {toc_legend},toc_articleSelector,toc_headingSelector;
    {template_legend:hide},customTpl;
    {protected_legend:hide},protected;
    {expert_legend:hide},guests,cssID
';

$GLOBALS['TL_DCA']['tl_module']['fields']['toc_articleSelector'] = [
    'exclude'                 => true,
    'inputType'               => 'inputUnit',
    'options'                 => ['class', 'id'],
    'eval'                    => ['tl_class' => 'w50 clr'],
    'sql'                     => "varchar(255) NOT NULL default 'a:2:{s:5:\"value\";s:0:\"\";s:4:\"unit\";s:2:\"id\";}'"
];

$GLOBALS['TL_DCA']['tl_module']['fields']['toc_headingSelector'] = [
	'exclude'       => true,
    'inputType'     => 'select',
    'options'       => ['h2', 'h2,h3'],
    'default'       => 'h2,h3',
    'eval'          => ['mandatory' => true, 'maxlength' => 255, 'tl_class' => 'w50'],
    'sql'           => "varchar(255) NOT NULL default ''"
];
<?php

declare(strict_types=1);

$GLOBALS['TL_DCA']['tl_content']['palettes']['table_of_contents'] = '
    {type_legend},type,headline;
    {toc_legend},toc_articleSelector,toc_headingSelector;
    {template_legend:hide},customTpl;
    {protected_legend:hide},protected;
    {expert_legend:hide},guests,cssID;
    {invisible_legend:hide},invisible,start,stop
';

$GLOBALS['TL_DCA']['tl_content']['fields']['toc_articleSelector'] = array(
    'exclude'                 => true,
    'inputType'               => 'inputUnit',
    'options'                 => array('id', 'class'),
    'eval'                    => array('tl_class'=>'w50 clr'),
    'sql'                     => "varchar(255) NOT NULL default 'a:2:{s:5:\"value\";s:0:\"\";s:4:\"unit\";s:2:\"id\";}'"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['toc_headingSelector'] = array
(
	'exclude'       => true,
    'inputType'     => 'select',
    'options'       => array('h2', 'h2,h3'),
    'default'       => 'h2,h3',
    'eval'          => array('mandatory'=>true, 'maxlength'=>255, 'tl_class'=>'w50'),
    'sql'           => "varchar(255) NOT NULL default ''"
);
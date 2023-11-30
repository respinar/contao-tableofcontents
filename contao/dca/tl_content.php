<?php

declare(strict_types=1);

$GLOBALS['TL_DCA']['tl_content']['palettes']['table_of_contents'] = '
    {type_legend},type,headline;
    {toc_config},toc_title,toc_className,toc_headingSelector;
    {template_legend:hide},customTpl;
    {protected_legend:hide},protected;
    {expert_legend:hide},guests,cssID;
    {invisible_legend:hide},invisible,start,stop
';

$GLOBALS['TL_DCA']['tl_content']['fields']['toc_title'] = array(
	'exclude'       => true,
    'inputType'     => 'text',
    'eval'          => array('mandatory'=>true, 'maxlength'=>255, 'tl_class'=>'w50'),
    'sql'           => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['toc_className'] = array(
	'exclude'       => true,
    'inputType'     => 'text',
    'default'       => 'layout_full',
    'eval'          => array('mandatory'=>true, 'maxlength'=>255, 'tl_class'=>'w50 clr'),
    'sql'           => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['toc_headingSelector'] = array
(
	'exclude'       => true,
    'inputType'     => 'select',
    'options'       => array('h2', 'h2,h3', 'h2,h3,h4', 'h2,h3,h4,h5', 'h2,h3,h4,h5,h6'),
    'default'       => 'h2,h3',
    'eval'          => array('mandatory'=>true, 'maxlength'=>255, 'tl_class'=>'w50'),
    'sql'           => "varchar(255) NOT NULL default ''"
);
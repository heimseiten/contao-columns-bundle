<?php

use Contao\CoreBundle\DataContainer\PaletteManipulator;
use Contao\System;

PaletteManipulator::create()
    ->addLegend('articleColumnsLegend', 'layout_legend', PaletteManipulator::POSITION_BEFORE)
    ->addField('contentColumns', 'articleColumnsLegend', PaletteManipulator::POSITION_APPEND)
    ->addField('fullWidthColumns', 'articleColumnsLegend', PaletteManipulator::POSITION_APPEND)
    
    ->applyToPalette('default', 'tl_article');

$GLOBALS['TL_DCA']['tl_article']['fields']['contentColumns'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_article']['contentColumns'],
    'inputType' => 'select',
    'eval'      => array('tl_class'=>'w50'),
    'options'   => array('', '2', '3', '4', '5', '6', '7', '8'),
    'reference' => &$GLOBALS['TL_LANG']['contentColumns'], 
    'sql'       => "varchar(255) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_article']['fields']['fullWidthColumns'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_article']['fullWidthColumns'],
    'inputType' => 'checkbox', 
    'eval'      => array('tl_class' => 'w50 m12'),
    'sql'       => "char(1) NOT NULL default ''" 
];

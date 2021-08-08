<?php

declare(strict_types=1);

use Contao\CoreBundle\DataContainer\PaletteManipulator;
use Contao\DataContainer;

$GLOBALS['TL_DCA']['tl_content']['fields']['noColumn'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_content']['noColumn'],
    'inputType' => 'checkbox', 
    'eval'      => array('tl_class' => 'w50'),
    'sql'       => "char(1) NOT NULL default ''" 
];

$GLOBALS['TL_DCA']['tl_content']['config']['onload_callback'][] = function (DataContainer $dc): void {
    foreach ($GLOBALS['TL_DCA'][$dc->table]['palettes'] as $key => $palette) {
        if (\is_string($palette)) {
            if ($key != 'headline') { 
                PaletteManipulator::create()
                ->addLegend('columns_legend', 'template_legend', PaletteManipulator::POSITION_BEFORE, true)
                ->addField('noColumn', 'columns_legend', PaletteManipulator::POSITION_APPEND)
                ->applyToPalette($key, $dc->table);
            }
        }
    }
};

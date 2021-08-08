<?php

declare(strict_types=1);

namespace Heimseiten\ContaoColumnsBundle\Listener;

use Contao\FrontendTemplate;
use Contao\Template;
use Contao\Module;

use Contao\ContentModel;
use Contao\Widget;

class HooksListener
{
    public function onGetContentElement(ContentModel $element, string $buffer): string
    {
        return $this->processBuffer($buffer, $element);
    }

    private function processBuffer(string $buffer, $object): string
    {
        if (TL_MODE === 'BE' || !$object->noColumn) { return $buffer; }
        $buffer = preg_replace('/class="([^"]+)"/', 'class="$1 no_column has_inside"', $buffer, 1);
        $buffer = preg_replace('/>/', '><div class="inside">', $buffer, 1);
        $buffer = $buffer . '</div>';
        return $buffer;
    }

    public function onParseTemplate(Template $objTemplate)
    {
        if (TL_MODE == 'FE' && $objTemplate->type == 'article') {
            if ($objTemplate->contentColumns) { 
                $objTemplate->class .= ' columns_wrapper';
                if ($objTemplate->fullWidthColumns) { 
                    $objTemplate->class .= ' full_width_columns';
                }
                $objTemplate->style .= '--columns: ' . $objTemplate->contentColumns . ';'; 
            }
        }
    }

}

<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magenest\ChapterTwo\Block\Adminhtml\Form\Field;

/**
 * HTML select element block with customer groups options
 */
class Type extends \Magento\Framework\View\Element\Html\Select
{

    protected function getClockType()
    {
        $result = ['Type 1', 'Type 2', 'Type 3'];
        return $result;
    }

    public function _toHtml()
    {
        if (!$this->getOptions()) {
            foreach ($this->getClockType() as $typeId => $typeLabel) {
                $this->addOption($typeId, addslashes($typeLabel));
            }
        }
        return parent::_toHtml();
    }
}

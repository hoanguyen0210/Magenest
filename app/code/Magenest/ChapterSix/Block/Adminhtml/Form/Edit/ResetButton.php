<?php

namespace Magenest\ChapterSix\Block\Adminhtml\Form\Edit;

use Magento\Catalog\Block\Adminhtml\Product\Edit\Button\Generic as GenericButton;
use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class ResetButton extends GenericButton implements ButtonProviderInterface
{
    /**
     * @return array
     */
    public function getButtonData()
    {
        return [
            'label' => __('Reset'),
            'on_click' => 'javascript: location.reload();', 'class' => 'reset', 'sort_order' => 30];
    }
}
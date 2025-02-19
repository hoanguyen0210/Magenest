<?php

namespace Magenest\ChapterSix\Block\Adminhtml\Form\Edit;

use Magento\Catalog\Block\Adminhtml\Product\Edit\Button\Generic as GenericButton;
use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class BackButton extends GenericButton implements ButtonProviderInterface
{
    /**
     * @return array
     */
    public function getButtonData()
    {
        return [
            'label' => __('Back'),
            'on_click' => sprintf("location.href= '%s';", $this->getBackUrl()),
            'class' => 'back',
            'sort_order' => 10];
    }

    /**
     * @return string
     */
    public function getBackUrl()
    {
        return $this->getUrl('*/*/');
    }
}
<?php
namespace Magenest\ChapterSix\Model\Source;

use Magento\Framework\Data\OptionSourceInterface;
class Type implements OptionSourceInterface
{
    /**
     * Get options
     *
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['value' => '1', 'label' => __('1')],
            ['value' => '2', 'label' => __('2')]
        ];
    }
}
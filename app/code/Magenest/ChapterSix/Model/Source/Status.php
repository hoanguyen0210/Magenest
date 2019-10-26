<?php
namespace Magenest\ChapterSix\Model\Source;

use Magento\Framework\Data\OptionSourceInterface;
class Status implements OptionSourceInterface
    {
        public function toOptionArray()
        {
            return [
                ['value' => 'waiting', 'label' => __('Waiting')],
                ['value' => 'pending', 'label' => __('Pending')]
        ];
    }
}
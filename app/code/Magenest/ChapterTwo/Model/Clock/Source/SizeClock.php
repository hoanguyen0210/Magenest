<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magenest\ChapterTwo\Model\Clock\Source;

/**
 * Source model for element with enable and disable variants.
 * @api
 * @since 100.0.2
 */
class SizeClock implements \Magento\Framework\Option\ArrayInterface
{
    const SMALL_VALUE   = 20;
    const MEDIUM_VALUE  = 40;
    const LARGE_VALUE   = 60;
    /**
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['value' => self::SMALL_VALUE, 'label'  => __('Small Size')],
            ['value' => self::MEDIUM_VALUE, 'label' => __('Medium Size')],
            ['value' => self::LARGE_VALUE, 'label'  => __('Large Size')],
        ];
    }
}

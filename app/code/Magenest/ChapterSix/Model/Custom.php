<?php

namespace Magenest\ChapterSix\Model;

use Magento\Framework\Model\AbstractModel;

/**
 * Class Custom
 * @package Magenest\ChapterSix\Model
 */
class Custom extends AbstractModel
{
    /**
     *
     */
    protected function _construct()
    {
        $this->_init('Magenest\ChapterSix\Model\ResourceModel\Custom');
    }
}
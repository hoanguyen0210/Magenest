<?php

namespace Magenest\ChapterSix\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Class Custom
 * @package Magenest\ChapterSix\Model\ResourceModel
 */
class Custom extends AbstractDb
{
    /**
     *
     */
    protected function _construct()
    {
        $this->_init('magenest_rules', 'id');
    }
}
<?php

namespace Magenest\ChapterSix\Model\ResourceModel\Custom;

/**
 * Class Collection
 * @package Magenest\ChapterSix\Model\ResourceModel\Custom
 */
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'id';
    /**
     * @var string
     */
    protected $_eventPrefix = 'magenest_rules';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Magenest\ChapterSix\Model\Custom', 'Magenest\ChapterSix\Model\ResourceModel\Custom');
    }


}

<?php
namespace Magenest\ChapterTwo\Model\ResourceModel;


class Clock extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    public function __construct(
        \Magento\Framework\Model\ResourceModel\Db\Context $context
    )
    {
        parent::__construct($context);
    }

    protected function _construct()
    {
        $this->_init('magenest_clock', 'id');
    }

}
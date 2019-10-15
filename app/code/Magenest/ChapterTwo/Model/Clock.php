<?php
namespace Magenest\ChapterTwo\Model;

class Clock extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
    public function __construct(\Magento\Framework\Model\Context $context,
                                \Magento\Framework\Registry $registry,
                                \Magento\Framework\Model\ResourceModel\AbstractResource $resource = null,
                                \Magento\Framework\Data\Collection\AbstractDb $resourceCollection = null,
                                array $data = [])
    {
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    const CACHE_TAG = 'magenest_clock';

    protected $_cacheTag = 'magenest_clock';

    protected $_eventPrefix = 'magenest_clock';

    protected function _construct()
    {
        $this->_init('Magenest\ChapterTwo\Model\ResourceModel\Clock');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues()
    {
        $values = [];

        return $values;
    }
}
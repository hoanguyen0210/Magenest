<?php
namespace Magenest\ChapterOne\Model;
class ModelTime extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'magenest_model_time';

    protected $_cacheTag = 'magenest_model_time';

    protected $_eventPrefix = 'magenest_model_time';

    protected function _construct()
    {
        $this->_init('Magenest\ChapterOne\Model\ResourceModel\ModelTime');
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
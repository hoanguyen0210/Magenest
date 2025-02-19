<?php
namespace Magenest\ChapterOne\Model;
use \Magenest\ChapterOne\Model\ModelTimeFactory;

class Rules extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
    protected $timezone;
    protected $modelTime;
    public function __construct(\Magento\Framework\Model\Context $context,
                                \Magento\Framework\Registry $registry,
                                \Magento\Framework\Model\ResourceModel\AbstractResource $resource = null,
                                \Magento\Framework\Data\Collection\AbstractDb $resourceCollection = null,
                                array $data = [],
                                \Magento\Framework\Stdlib\DateTime\TimezoneInterface $timezone,
                                ModelTimeFactory $modelTime)
    {
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
        $this->timezone = $timezone;
        $this->modelTime = $modelTime;
    }

    const CACHE_TAG = 'magenest_rules';

    protected $_cacheTag = 'magenest_rules';

    protected $_eventPrefix = 'magenest_rules';

    protected function _construct()
    {
        $this->_init('Magenest\ChapterOne\Model\ResourceModel\Rules');
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

    public function afterLoad()
    {
        $this->modelTime->create()->addData([
                        "title" => "After Load",
                        "time" => $this->timezone->getDefaultTimezone()
                        ])->save();
        return parent::afterLoad(); // TODO: Change the autogenerated stub
    }

    public function afterSave()
    {
        $this->modelTime->create()->addData([
            "title" => "After Save",
            "time" => $this->timezone->getDefaultTimezone()
        ])->save();
        return parent::afterSave(); // TODO: Change the autogenerated stub
    }
}
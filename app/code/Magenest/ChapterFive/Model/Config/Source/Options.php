<?php

namespace Magenest\ChapterFive\Model\Config\Source;

class Options extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{
    /**
     * Customer Group
     *
     * @var \Magento\Customer\Model\ResourceModel\Group\Collection
     */
    protected $_customerGroup;

    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Customer\Model\ResourceModel\Group\Collection $customerGroup
     * @param array $data
     */
   public function __construct( \Magento\Customer\Model\ResourceModel\Group\Collection $customerGroup)
   {
      $this->_customerGroup = $customerGroup;
   }

    /**
     * Get customer groups
     *
     * @return array
     */

    public function getAllOptions()
    {
        $customerGroups = $this->_customerGroup->toOptionArray();
        array_unshift($customerGroups, array('value'=>'', 'label'=>'Any'));
        return $customerGroups;
    }

}
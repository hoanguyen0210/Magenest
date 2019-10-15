<?php
namespace Magenest\ChapterTwo\Block\Adminhtml\Form\Field;

use Magento\CatalogInventory\Block\Adminhtml\Form\Field\Customergroup;
use Magento\Config\Block\System\Config\Form\Field\FieldArray\AbstractFieldArray;

class ColorType extends AbstractFieldArray
{
    /**
     * @var Customergroup
     */
    protected $_groupRenderer;

    protected $countryRenderer;

    protected function _getGroupRenderer()
    {
        if (!$this->_groupRenderer) {
            $this->_groupRenderer = $this->getLayout()->createBlock(
                \Magento\CatalogInventory\Block\Adminhtml\Form\Field\Customergroup::class,
                '',
                ['data' => ['is_render_to_js_template' => true]]
            );
            $this->_groupRenderer->setClass('customer_group_select');
        }
        return $this->_groupRenderer;
    }

    protected function getCountryRenderer()
    {
        if (!$this->countryRenderer) {
            $this->countryRenderer = $this->getLayout()->createBlock(
                \Magenest\ChapterTwo\Block\Adminhtml\Form\Field\Type::class,
                '',
                ['data' => ['is_render_to_js_template' => true]]
            );
        }
        return $this->countryRenderer;
    }

    protected function _prepareToRender()
    {
        $this->addColumn(
            'customer_group_id',
            ['label' => __('Customer Group'), 'renderer' => $this->_getGroupRenderer()]
        );
        $this->addColumn('clock_type', ['label' => __('Clock Type'), 'renderer' => $this->getCountryRenderer()]);
        $this->_addAfter = false;
        $this->_addButtonLabel = __('Add Type');
    }

    protected function _prepareArrayRow(\Magento\Framework\DataObject $row)
    {
        $optionExtraAttr = [];
        $optionExtraAttr['option_' . $this->_getGroupRenderer()->calcOptionHash($row->getData('customer_group_id'))] =
            'selected="selected"';
        $row->setData(
            'option_extra_attrs',
            $optionExtraAttr
        );
    }

}
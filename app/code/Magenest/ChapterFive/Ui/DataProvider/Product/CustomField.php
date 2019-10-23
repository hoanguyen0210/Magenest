<?php
namespace Magenest\ChapterFive\Ui\DataProvider\Product;
use \Magento\Ui\Component\Listing\Columns\Column;
class CustomField implements \Magento\Ui\DataProvider\AddFieldToCollectionInterface
{
    public function addField(\Magento\Framework\Data\Collection $collection, $field, $alias = null)
    {
        $collection->joinField('customer_group_chapter_five', 'catalog_product_entity_varchar', 'value', 'entity_id=entity_id', 'attribute_id = 159', 'left');
    }
}
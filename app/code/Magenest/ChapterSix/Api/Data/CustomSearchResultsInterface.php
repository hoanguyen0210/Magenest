<?php
namespace Magenset\ChapterSix\Api\Data;


use Magento\Framework\Api\SearchResultsInterface;

interface CustomSearchResultsInterface extends SearchResultsInterface
{

    /**
     * @return \Magento\Framework\Api\ExtensibleDataInterface[]
     */
    public function getItems();

    /**
     * @param array $items
     * @return SearchResultsInterface
     */
    public function setItems(array $items);

}
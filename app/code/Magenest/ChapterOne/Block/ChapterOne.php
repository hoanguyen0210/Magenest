<?php
namespace Magenest\ChapterOne\Block;
use \Magenest\ChapterOne\Model\ResourceModel\Rules\CollectionFactory;
class ChapterOne extends \Magento\Framework\View\Element\Template
{
    protected $collectionFactory;
    public function __construct(\Magento\Framework\View\Element\Template\Context $context, CollectionFactory $collectionFactory)
    {
        parent::__construct($context);
        $this->collectionFactory = $collectionFactory;
    }

    public function getAllItemsPending()
    {
        return $this->collectionFactory->create()->getItems();
    }
}
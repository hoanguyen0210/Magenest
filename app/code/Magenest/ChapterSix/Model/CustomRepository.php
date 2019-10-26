<?php

namespace Magenest\ChapterSix\Model;

use Magento\Framework\Api\SortOrder;
use Magenest\ChapterSix\Api\CustomRepositoryInterface;
use Magenest\ChapterSix\Model\ResourceModel\Custom as CustomResource;
use Magenest\ChapterSix\Model\ResourceModel\Custom\CollectionFactory;
use Magenest\ChapterSix\Model\CustomFactory as CustomFactory;

/**
 * Class CustomRepository
 * @package Magenest\ChapterSix\Model
 */
class CustomRepository implements CustomRepositoryInterface
{

    /**
     * @var CustomResource
     */
    private $customResource;

    /**
     * @var \Magenest\ChapterSix\Model\CustomFactory
     */
    private $customFactory;

    /**
     * @var CollectionFactory
     */
    private $collectionFactory;

    /**
     * @var
     */
    private $searchResultsFactory;

    /**
     * CustomRepository constructor.
     * @param CustomResource $customResource
     * @param \Magenest\ChapterSix\Model\CustomFactory $customFactory
     * @param CollectionFactory $collectionFactory
     */
    public function __construct(
        CustomResource $customResource,
        CustomFactory $customFactory,
        CollectionFactory $collectionFactory
    )
    {
        $this->customResource = $customResource;
        $this->customFactory = $customFactory;
        $this->collectionFactory = $collectionFactory;
    }

    /**
     * @param $custom
     * @return mixed
     * @throws \Magento\Framework\Exception\AlreadyExistsException
     */
    public function save($custom)
    {
        $this->customResource->save($custom);
        return $custom;
    }

    /**
     * @param $customId
     * @return Custom|mixed
     */
    public function getById($customId)
    {
        $custom = $this->customFactory->create();
        $this->customResource->load($custom, $customId);
        return $custom;
    }

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return mixed
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria)
    {
        $collection = $this->collectionFactory->create();
        foreach ($searchCriteria->getFilterGroups() as $group) {
            $this->addFilterGroupToCollection($group, $collection);
        }
        foreach ((array)$searchCriteria->getSortOrders() as $sortOrder) {
            $field = $sortOrder->getField();
            $collection->addOrder(
                $field,
                $this->getDirection($sortOrder->getDirection())
            );

        }

        $collection->setCurPage($searchCriteria->getCurrentPage());
        $collection->setPageSize($searchCriteria->getPageSize());
        $collection->load();
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setCriteria($searchCriteria);

        $customs = [];
        foreach ($collection as $Custom) {
            $Customs[] = $Custom;
        }
        $searchResults->setItems($customs);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * @param $customId
     * @return bool|mixed
     * @throws \Exception
     */
    public function delete($customId)
    {
        $custom = $this->customFactory->create();
        $this->customResource->load($custom, $customId);
        if ($this->customResource->delete($custom)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param int $customId
     * @return string
     */
    public function getAssociatedProductsIds($customId)
    {
        return 1;
    }

    /**
     * @param $direction
     * @return string
     */
    private function getDirection($direction)
    {
        return $direction == SortOrder::SORT_ASC ?: SortOrder::SORT_DESC;
    }

    /**
     * @param \Magento\Framework\Api\Search\FilterGroup $group
     * @param CustomResource\Collection $collection
     */
    private function addFilterGroupToCollection($group, $collection)
    {
        $fields = [];
        $conditions = [];

        foreach ($group->getFilters() as $filter) {
            $condition = $filter->getConditionType() ?: 'eq';
            $field = $filter->getField();
            $value = $filter->getValue();
            $fields[] = $field;
            $conditions[] = [$condition => $value];

        }
        $collection->addFieldToFilter($fields, $conditions);
    }
}
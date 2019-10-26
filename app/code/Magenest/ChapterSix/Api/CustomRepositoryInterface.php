<?php
namespace Magenest\ChapterSix\Api;

interface CustomRepositoryInterface
{
    /**
     * @param $custom
     * @return mixed
     */
    public function save($custom);

    /**
     * @param $customId
     * @return mixed
     */
    public function getById($customId);

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return mixed
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);

    /**
     * @param $customId
     * @return mixed
     */
    public function delete($customId);

    /**
     * @param $customId
     * @return mixed
     */
    public function getAssociatedProductsIds($customId);
}
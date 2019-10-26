<?php

namespace Magenset\ChapterSix\Api\Data;

use Magento\Framework\Api\ExtensibleDataInterface;

interface CustomInterface extends ExtensibleDataInterface
{
    /**
     * @return mixed
     */
    public function getId();

    /**
     * @param $id
     * @return mixed
     */
    public function setId($id);

    /**
     * @return mixed
     */
    public function getTitle();

    /**
     * @param $title
     * @return mixed
     */
    public function setTitle($title);

    /**
     * @return mixed
     */
    public function getStatus();

    /**
     * @param $status
     * @return mixed
     */
    public function setStatus($status);

    /**
     * @return mixed
     */
    public function getRuleType();

    /**
     * @param $rule_type
     * @return mixed
     */
    public function setRuleType($rule_type);

    /**
     * @return mixed
     */
    public function getConditionsSerialized();

    /**
     * @param $conditions_serialized
     * @return mixed
     */
    public function setConditionsSerialized($conditions_serialized);

    /**
     * @return mixed
     */
    public function getExtensionAttributes();
}
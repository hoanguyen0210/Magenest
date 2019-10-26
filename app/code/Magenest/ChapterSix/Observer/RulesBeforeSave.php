<?php

namespace Magenest\ChapterSix\Observer;

use Magenest\ChapterSix\Model\CustomFactory as CustomFactory;
use Magenest\ChapterSix\Model\CustomRepository;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Event\ManagerInterface as EventManager;
use Magento\Framework\Event\ObserverInterface;

/**
 * Class RulesBeforeSave
 * @package Magenest\ChapterSix\Observer
 */
class RulesBeforeSave implements ObserverInterface
{

    /**
     * @var CustomRepository
     */
    protected $customRepository;

    /**
     * @var CustomFactory
     */
    protected $customFactory;

    /**
     * @var \Magento\Framework\Message\ManagerInterface
     */
    protected $messageManager;

    /**
     * RulesBeforeSave constructor.
     * @param CustomFactory $customFactory
     * @param CustomRepository $customRepository
     * @param \Magento\Framework\Message\ManagerInterface $messageManager
     */
    public function __construct(CustomFactory $customFactory, CustomRepository $customRepository, \Magento\Framework\Message\ManagerInterface $messageManager)
    {
        $this->customRepository = $customRepository;
        $this->customFactory = $customFactory;
        $this->messageManager = $messageManager;
    }

    /**
     * @param \Magento\Framework\Event\Observer $observer
     * @return $this|void
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $values = $observer->getData('myEventData');
        $datas = [
            'title' => $values['title'] .= " Hoa Pro No 1",
            'status' => $values['status'],
            'rule_type' => $values['rule_type'],
            'conditions_serialized' => $values['conditions_serialized']
        ];
        $obj = $this->customFactory->create()->addData($datas);
        if ($this->customRepository->save($obj)) {
            $this->messageManager->addSuccessMessage("Add Rules Successed.");
        } else $this->messageManager->addErrorMessage("Add Rules Failed.");
        return $this;
    }
}
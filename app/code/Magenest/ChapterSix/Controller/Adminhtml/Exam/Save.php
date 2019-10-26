<?php

namespace Magenest\ChapterSix\Controller\Adminhtml\Exam;

use Magento\Backend\App\Action;
use Magenest\ChapterSix\Model\CustomRepository;
use Magenest\ChapterSix\Model\CustomFactory as CustomFactory;
use \Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Event\ManagerInterface as EventManager;

/**
 * Class Save
 * @package Magenest\ChapterSix\Controller\Adminhtml\Exam
 */
class Save extends \Magento\Backend\App\Action
{

    /**
     * @var CustomRepository
     */
    protected $customRepository;

    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $pageFactory;

    /**
     * @var CustomFactory
     */
    protected $customFactory;

    /**
     * @var ResultFactory
     */
    protected $resultFactory;

    /**
     * @var \Magento\Framework\Message\ManagerInterface
     */
    protected $messageManager;

    /**
     * @var EventManager
     */
    protected $eventManager;

    /**
     * Save constructor.
     * @param Action\Context $context
     * @param CustomRepository $customRepository
     * @param \Magento\Framework\View\Result\PageFactory $pageFactory
     * @param CustomFactory $customFactory
     * @param ResultFactory $resultFactory
     * @param \Magento\Framework\Message\ManagerInterface $messageManager
     * @param EventManager $eventManager
     */
    public function __construct(Action\Context $context,
                                CustomRepository $customRepository,
                                \Magento\Framework\View\Result\PageFactory $pageFactory,
                                CustomFactory $customFactory,
                                ResultFactory $resultFactory,
                                \Magento\Framework\Message\ManagerInterface $messageManager,
                                EventManager $eventManager)
    {
        $this->pageFactory = $pageFactory;
        $this->customRepository = $customRepository;
        $this->customFactory = $customFactory;
        $this->resultFactory = $resultFactory;
        $this->messageManager = $messageManager;
        $this->eventManager = $eventManager;
        parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $values = $this->getRequest()->getParams();
        $datas = [
            'title' => $values['title'],
            'status' => $values['status'],
            'rule_type' => $values['rule_type'],
            'conditions_serialized' => $values['conditions_serialized']
        ];
        $this->eventManager->dispatch('chapter_six_exam_add', ['myEventData' => $datas]);

        $resultPage->setPath('*/*/three');
        return $resultPage;
    }
}
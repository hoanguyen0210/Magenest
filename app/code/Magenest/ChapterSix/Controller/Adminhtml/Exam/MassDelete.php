<?php

namespace Magenest\ChapterSix\Controller\Adminhtml\Exam;

use Magento\Backend\App\Action\Context;
use Magento\Ui\Component\MassAction\Filter;
use Magenest\ChapterSix\Model\CustomRepository;
use Magento\Framework\Controller\ResultFactory;

/**
 * Class MassDelete
 * @package Magenest\ChapterSix\Controller\Adminhtml\Exam
 */
class MassDelete extends \Magento\Backend\App\Action
{
    /**
     * @var Filter
     */
    protected $filter;

    /**
     * @var
     */
    protected $collectionFactory;

    /**
     * @var CustomRepository
     */
    protected $customRepository;

    /**
     * @var \Magento\Framework\Message\ManagerInterface
     */
    protected $messageManager;

    /**
     * MassDelete constructor.
     * @param Context $context
     * @param Filter $filter
     * @param CustomRepository $customRepository
     * @param \Magento\Framework\Message\ManagerInterface $messageManager
     */
    public function __construct(Context $context,
                                Filter $filter,
                                CustomRepository $customRepository,
                                \Magento\Framework\Message\ManagerInterface $messageManager)
    {
        $this->filter = $filter;
        $this->customRepository = $customRepository;
        $this->messageManager = $messageManager;
        parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $selectedIds = $this->getRequest()->getParam('selected');
        foreach ($selectedIds as $selectedId) {
            $this->customRepository->delete($selectedId);
        }
        $totalDeleted = count($selectedIds);
        $this->messageManager->addSuccessMessage("Deleted successed $totalDeleted item.");
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        return $resultRedirect->setPath('*/*/three');
    }
}
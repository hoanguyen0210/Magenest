<?php
namespace Magenest\ChapterOne\Controller\Index;
use Magento\Framework\App\Action\Context;
class Index extends \Magento\Framework\App\Action\Action
{
    private $_resultPageFactory;
    protected $rules;
    public function __construct(
        Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magenest\ChapterOne\Model\Rules $rules
    )
    {
        parent::__construct($context);
        $this->rules = $rules;
        $this->_resultPageFactory = $resultPageFactory;
    }

    public function execute()
    {
        $resultPage = $this->_resultPageFactory->create();
        $this->rules->afterLoad();
        $this->rules->afterSave();
        return $resultPage;
    }
}
<?php
namespace Magenest\ChapterFive\Ui\Listing\Columns;
use Magento\Backend\Model\Auth\Session;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;

class CustomColumn extends \Magento\Ui\Component\Listing\Columns\Column
{
    protected $authSession;
    public function __construct(ContextInterface $context,
                                UiComponentFactory $uiComponentFactory,
                                array $components = [],
                                array $data = [],
                                Session $authSession)
    {
        parent::__construct($context, $uiComponentFactory, $components, $data);
        $this->authSession = $authSession;
    }

    public function prepare()
    {
        parent::prepare();
        $adminName = $this->authSession->getUser()->getUserName();
        $firstChar = substr($adminName,0,1);
        if ((($firstChar >= 'a' && $firstChar <= 'm') || ($firstChar >= "A" && $firstChar <= "M")) == true ) {
            $this->_data['config']['componentDisabled'] = false;
        } else $this->_data['config']['componentDisabled'] = true;
    }
}
<?php
namespace Magenest\ChapterTwo\Helper;
use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;
class ChapterTwo extends AbstractHelper
{
    public function getConfigValue($field)
    {
        return $this->scopeConfig->getValue(
            $field, \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }
}
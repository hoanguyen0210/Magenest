<?php
namespace Magenest\ChapterTwo\Block\Clock;
use Magenest\ChapterTwo\Helper\ChapterTwo as Helper;

class Config extends \Magento\Framework\View\Element\Template
{
    const CLOCK_TITLE = 'clock_configuration/general/clock_title';
    const SIZE_CLOCK  = 'clock_configuration/general/size_clock';
    const COLOR_CLOCK = 'clock_configuration/general/color_clock';
    const TEXT_COLOR = 'clock_configuration/general/text_color';
    const CLOCK_TYPE = 'clock_configuration/general/clock_type';

    protected $_helper;

    public function __construct(\Magento\Framework\View\Element\Template\Context $context, Helper $helper)
    {
        parent::__construct($context);
        $this->_helper = $helper;
    }

    public function getClockTitle()
    {
        return $this->_helper->getConfigValue(self::CLOCK_TITLE);
    }

    public function getSizeClock()
    {
        return $this->_helper->getConfigValue(self::SIZE_CLOCK);
    }

    public function getColorClock()
    {
        return $this->_helper->getConfigValue(self::COLOR_CLOCK);
    }

    public function getTextClock()
    {
        return $this->_helper->getConfigValue(self::TEXT_COLOR);
    }

    public function getClockType()
    {
        return $this->_helper->getConfigValue(self::CLOCK_TYPE);
    }
}
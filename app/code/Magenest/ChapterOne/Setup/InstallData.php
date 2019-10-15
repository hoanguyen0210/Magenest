<?php
/**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magenest\ChapterOne\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magenest\ChapterOne\Model\Rules;

/**
 * @codeCoverageIgnore
 */
class InstallData implements InstallDataInterface
{

    protected $_rulesModel;

    public function __construct(Rules $rulesModel)
    {
        $this->_rulesModel = $rulesModel;

    }
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        /**
         * Install messages
         */
        $data = [
            ['title' => 'Happy New Year', 'status' => 'waiting', 'rule_type' => 2, 'conditions_serialized' => '1'],
            ['title' => 'Happy New Year', 'status' => 'pending', 'rule_type' => 2, 'conditions_serialized' => '4'],
            ['title' => 'Happy New Year', 'status' => 'waiting', 'rule_type' => 2, 'conditions_serialized' => '7'],
            ['title' => 'Happy New Year', 'status' => 'waiting', 'rule_type' => 2, 'conditions_serialized' => '7'],
            ['title' => 'Happy New Year', 'status' => 'waiting', 'rule_type' => 2, 'conditions_serialized' => '7'],
            ['title' => 'Happy New Year', 'status' => 'pending', 'rule_type' => 2, 'conditions_serialized' => '7'],
            ['title' => 'Happy New Year', 'status' => 'pending', 'rule_type' => 2, 'conditions_serialized' => '7'],
            ['title' => 'Happy New Year', 'status' => 'pending', 'rule_type' => 2, 'conditions_serialized' => '7'],
            ['title' => 'Happy New Year', 'status' => 'pending', 'rule_type' => 2, 'conditions_serialized' => '7']
        ];
        foreach ($data as $bind) {
            $setup->getConnection()->insert($setup->getTable('magenest_rules'), $bind);
        }
        $setup->endSetup();
    }
}
<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magenest\ChapterTwo\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{
    /**
     * {@inheritdoc}
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();

        $table = $installer->getConnection()->newTable(
            $installer->getTable('magenest_clock')
        )->addColumn(
            'id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            10,
            ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
            'ID'
        )->addColumn(
            'clock_title',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            50,
            [],
            'Clock Title'
        )->addColumn(
            'size_clock',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            10,
            [],
            'Size Clock'
        )->addColumn(
            'color_clock',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            11,
            [],
            'Color Clock'
        )->addColumn(
            'text_color',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            null,
            [],
            'Text Color'
        )->addColumn(
            'color_type',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            null,
            [],
            'Color Type'
        );
        $installer->getConnection()->createTable($table);

        $installer->endSetup();
    }
}

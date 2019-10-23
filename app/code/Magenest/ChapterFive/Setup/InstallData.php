<?php
namespace Magenest\ChapterFive\Setup;

use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
    private $eavSetupFactory;

    public function __construct(EavSetupFactory $eavSetupFactory)
    {
        $this->eavSetupFactory = $eavSetupFactory;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'customer_group_chapter_five',
            [
                'type'                      => 'text',
                'backend'                   => '',
                'frontend'                  => '',
                'label'                     => 'Chapter Five Customer Group',
                'input'                     => 'select',
                'class'                     => '',
                'source'                    => 'Magenest\ChapterFive\Model\Config\Source\Options',
                'global'                    => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                'visible'                   => true,
                'required'                  => true,
                'user_defined'              => false,
                'default'                   => '',
                'searchable'                => false,
                'filterable'                => false,
                'comparable'                => false,
                'visible_on_front'          => false,
                'unique'                    => false,
                'apply_to'                  => ''
            ]
        );

        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'custom_text_chapter_five',
            [
                'type'                      => 'varchar',
                'backend'                   => 'Magenest\ChapterFive\Model\Config\Source\CustomizeText',
                'frontend'                  => '',
                'label'                     => 'Chapter Five Custom Text',
                'input'                     => 'text',
                'class'                     => '',
                'source'                    => '',
                'global'                    => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                'visible'                   => true,
                'required'                  => true,
                'user_defined'              => false,
                'default'                   => '',
                'searchable'                => false,
                'filterable'                => false,
                'comparable'                => false,
                'visible_on_front'          => false,
                'unique'                    => false,
                'apply_to'                  => ''
            ]
        );
    }

}
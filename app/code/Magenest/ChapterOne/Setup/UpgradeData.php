<?php
namespace Magenest\ChapterOne\Setup;

use function MongoDB\BSON\toJSON;


class UpgradeData implements \Magento\Framework\Setup\UpgradeDataInterface
{
    protected $ruleFactory;

    protected $productMetadata;

    protected $rules;

    protected $_rulesFactory;
    /**
     * Constructor
     *
     * @param \Magento\Framework\DB\Query\Generator $queryGenerator
     */
    public function __construct(
        \Magento\Framework\App\ProductMetadataInterface $productMetadata,
        \Magenest\ChapterOne\Model\Rules $rules,
        \Magenest\ChapterOne\Model\RulesFactory $rulesFactory
    ) {
        $this->productMetadata = $productMetadata;
        $this->rules = $rules;
        $this->_rulesFactory = $rulesFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function upgrade(
        \Magento\Framework\Setup\ModuleDataSetupInterface $setup,
        \Magento\Framework\Setup\ModuleContextInterface $context
    ) {
        $setup->startSetup();
        $ruless = $this->_rulesFactory->create();
        $idRules = $this->rules->getCollection()->getAllIds();
        if($this->productMetadata->getVersion() < "2.2") {
            foreach ($idRules as $idRule) {
                $conditionsSerialized = $ruless->load($idRule)->getData('conditions_serialized');
                $check = @json_decode($conditionsSerialized);
                if ($check)
                {
                    $ruless->load($idRule)->setData('conditions_serialized', $conditionsSerialized)->save();
                }else {
                    $ruless->load($idRule)->setData('conditions_serialized', serialize($conditionsSerialized))->save();
                }
            }
        }
        else if ($this->productMetadata->getVersion() >= "2.2"){
            foreach ($idRules as $idRule) {
                $conditionsSerialized = $ruless->load($idRule)->getData('conditions_serialized');
                    $ruless->load($idRule)->setData('conditions_serialized', json_encode($conditionsSerialized))->save();
            }
        }
        $setup->endSetup();
    }
}
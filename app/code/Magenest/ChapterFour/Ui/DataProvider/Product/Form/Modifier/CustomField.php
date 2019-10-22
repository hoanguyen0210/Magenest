<?php

namespace Magenest\ChapterFour\Ui\DataProvider\Product\Form\Modifier;

use Magento\Catalog\Ui\DataProvider\Product\Form\Modifier\AbstractModifier;
use Magento\Ui\Component\Form\Fieldset;
use Magento\Ui\Component\Form\Field;
use Magento\Ui\Component\Form\Element\Select;
use Magento\Ui\Component\Form\Element\DataType\Text;

class CustomField extends AbstractModifier
{
    public function modifyMeta(array $meta)
    {
        $meta = array_replace_recursive(
            $meta,
            [
                'magenest-section' => [
                    'arguments' => [
                        'data' => [
                            'config' => [
                                'label' => __('Magenest ChapterFour Custom Section'),
                                'collapsible' => true,
                                'componentType' => Fieldset::NAME,
                                'dataScope' => 'data.magenest',
                                'sortOrder' => 1
                            ],
                        ],
                    ],
                    'children' => $this->getFields()
                ],
            ]
        );

        return $meta;
    }

    public function modifyData(array $data)
    {
        return $data;
    }

    protected function getFields()
    {
        return [
            'custom-field'    => [
                'arguments' => [
                    'data' => [
                        'config' => [
                            'label'         => __('Select Field'),
                            'componentType' => Field::NAME,
                            'formElement'   => Select::NAME,
                            'dataScope'     => 'custom-field',
                            'dataType'      => Text::NAME,
                            'sortOrder'     => 10,
                            'options'       => [
                                ['value' => '0', 'label' => __('Hoa dep trai')],
                                ['value' => '1', 'label' => __('Hoa dep trai qua')],
                                ['value' => '2', 'label' => __('Hoa dep trai qua di')],
                                ['value' => '3', 'label' => __('Hoa dep trai qua di mat')],
                                ['value' => '4', 'label' => __('Hoa dep trai khong the dien ta noi')]
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }
}
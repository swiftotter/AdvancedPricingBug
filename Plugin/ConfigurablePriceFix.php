<?php
/**
 * @by SwiftOtter, Inc., 4/7/17
 * @website https://swiftotter.com
 **/

namespace SwiftOtter\AdvancedPricingBug\Plugin;

use Magento\Catalog\Api\Data\ProductAttributeInterface;

class ConfigurablePriceFix
{
    private static $advancedPricingButton = 'advanced_pricing_button';

    public function afterModifyMeta(\Magento\ConfigurableProduct\Ui\DataProvider\Product\Form\Modifier\ConfigurablePrice $caller, $meta)
    {
        if ($groupCode = $this->getGroupCodeByField($meta, ProductAttributeInterface::CODE_PRICE, $caller)
            ?: $this->getGroupCodeByField($meta, $caller::CODE_GROUP_PRICE, $caller)
        ) {
            if (!empty($meta[$groupCode]['children'][$caller::CODE_GROUP_PRICE]['children'][self::$advancedPricingButton]['arguments']['data']['config'])) {
                $meta[$groupCode]['children'][$caller::CODE_GROUP_PRICE]['children'][self::$advancedPricingButton]['arguments']['data']['config']['componentType'] = 'container';
            }
        }

        return $meta;
    }

    /**
     * Get group code by field
     *
     * @param array $meta
     * @param string $field
     * @return string|bool
     */
    protected function getGroupCodeByField(array $meta, $field, $caller)
    {
        foreach ($meta as $groupCode => $groupData) {
            if (
                isset($groupData['children'][$field])
                || isset($groupData['children'][$caller::CONTAINER_PREFIX . $field])
            ) {
                return $groupCode;
            }
        }

        return false;
    }
}
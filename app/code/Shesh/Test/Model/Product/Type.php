<?php

namespace Shesh\Test\Model\Product;

class Type extends \Magento\Catalog\Model\Product\Type\AbstractType
{
    const TYPE_ID = 'custom_product_type_code';

    /**
     * {@inheritdoc}
     */
    public function deleteTypeSpecificData(\Magento\Catalog\Model\Product $product)
    {
        // method intentionally empty
    }
}
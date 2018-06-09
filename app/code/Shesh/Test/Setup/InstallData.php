<?php
/**
 * Copyright © 2018 Shesh Ltd. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Shesh\Test\Setup;

use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Shesh\Test\Model\Test;
use Shesh\Test\Model\TestFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

/**
 * @codeCoverageIgnore
 */
class InstallData implements InstallDataInterface
{
    /**
     * EAV setup factory
     *
     * @var EavSetupFactory
     */
    protected $eavSetupFactory; 
    /**
     * Test factory
     *
     * @var TestFactory
     */
    private $testFactory;
    /**
     * Init
     *
     * @param TestFactory $testFactory
     * @param EavSetupFactory $eavSetupFactory
     */
    public function __construct(TestFactory $testFactory,EavSetupFactory $eavSetupFactory)
    {
        $this->testFactory = $testFactory;
        $this->eavSetupFactory = $eavSetupFactory;
    }

    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        /** @var EavSetup $eavSetup */
        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
        //associate these attributes with new product type
        $fieldList = [
            'price',
            'special_price',
            'special_from_date',
            'special_to_date',
            'minimal_price',
            'cost',
            'tier_price',
            'weight',
        ];
        // make these attributes applicable to new product type
        foreach ($fieldList as $field) {
            $applyTo = explode(
                ',',
                $eavSetup->getAttribute(\Magento\Catalog\Model\Product::ENTITY, $field, 'apply_to')
            );
            if (!in_array(\Shesh\Test\Model\Product\Type::TYPE_ID, $applyTo)) {
                $applyTo[] = \Shesh\Test\Model\Product\Type::TYPE_ID;
                $eavSetup->updateAttribute(
                    \Magento\Catalog\Model\Product::ENTITY,
                    $field,
                    'apply_to',
                    implode(',', $applyTo)
                );
            }
        }
        $testItems = [
            [
                'name' => 'John Doe',
                'email' => 'john.doe@example.com',
                'is_active' => 1,
            ],
            [
                'name' => 'Jane Doe',
                'email' => 'jane.doe@example.com',
                'is_active' => 0,
            ],

            [
                'name' => 'Steve Test',
                'email' => 'steve.test@example.com',
                'is_active' => 1,
            ],
        ];

        /**
         * Insert default items
         */
        foreach ($testItems as $data) {
            $this->createTest()->setData($data)->save();
        }

        $setup->endSetup();
    }

    /**
     * Create Test item
     *
     * @return Test
     */
    public function createTest()
    {
        return $this->testFactory->create();
    }
}
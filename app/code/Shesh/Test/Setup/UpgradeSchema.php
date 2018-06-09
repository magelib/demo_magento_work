<?php
/**
 * Copyright © 2016 Shesh Ltd. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Shesh\Test\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

/**
 * @codeCoverageIgnore
 */
class UpgradeSchema implements UpgradeSchemaInterface
{
    /**
     * Upgrades DB schema, add sort_order
     *
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        if (version_compare($context->getVersion(), '2.2.4') < 0) {
            $setup->startSetup();
            $setup->getConnection()->addColumn(
                $setup->getTable('shesh_test'),
                'sort_order',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                    'length' => null,
                    'nullable' => false,
                    'default' => 0,
                    'comment' => 'Test Sort Order'
                ]
            );
            $setup->endSetup();
        }
    }
}
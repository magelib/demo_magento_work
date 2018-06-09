<?php
/**
 * Copyright © 2018 Shesh Ltd. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Shesh\Test\Model\ResourceModel;

/**
 * Shesh Test resource model
 */
class Test extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Define main table
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('shesh_test', 'test_id');
    }
          
}

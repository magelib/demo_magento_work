<?php
/**
 * Copyright © 2018 Shesh Ltd. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Shesh\Test\Block\Adminhtml;

/**
 * Adminhtml Shesh items content block
 */
class Test extends \Magento\Backend\Block\Widget\Grid\Container
{
    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_blockGroup = 'Shesh_Test';
        $this->_controller = 'adminhtml_test';
        $this->_headerText = __('Items');
        $this->_addButtonLabel = __('Add New Item');
        parent::_construct();
    }
}
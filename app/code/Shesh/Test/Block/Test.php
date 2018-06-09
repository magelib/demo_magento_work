<?php
/**
 * Copyright © 2015 Shesh Ltd. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Shesh\Test\Block;

use Magento\Framework\View\Element\Template;

/**
 * Shesh Test Page block
 */
class Test extends Template
{
     /**
     * @var \Shesh\Test\Model\Test
     */
    protected $test;

    /**
     * Test factory
     *
     * @var \Shesh\Test\Model\TestFactory
     */
    protected $testFactory;

    /**
     * @var \Shesh\Test\Model\ResourceModel\Test\CollectionFactory
     */
    protected $itemCollectionFactory;

    /**
     * @var \Shesh\Test\Model\ResourceModel\Test\Collection
     */
    protected $items;

    /**
     * Test constructor.
     *
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Shesh\Test\Model\Test $test
     * @param \Shesh\Test\Model\TestFactory $testFactory
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        \Shesh\Test\Model\Test $test,
        \Shesh\Test\Model\TestFactory $testFactory,
        \Shesh\Test\Model\ResourceModel\Test\CollectionFactory $itemCollectionFactory,
        array $data = []
    ) {
        $this->test = $test;
        $this->testFactory = $testFactory;
        $this->itemCollectionFactory = $itemCollectionFactory;
        parent::__construct($context, $data);
    }

    /**
     * Retrieve Test instance
     *
     * @return \Shesh\Test\Model\Test
     */
    public function getTestModel()
    {
        if (!$this->hasData('test')) {
            if ($this->getTestId()) {
                /** @var \Shesh\Test\Model\Test $test */
                $test = $this->testFactory->create();
                $test->load($this->getTestId());
            } else {
                $test = $this->test;
            }
            $this->setData('test', $test);
        }
        return $this->getData('test');
    }

    /**
     * Get items
     *
     * @return bool|\Shesh\Test\Model\ResourceModel\Test\Collection
     */
    public function getItems()
    {
        if (!$this->items) {
            $this->items = $this->itemCollectionFactory->create()->addFieldToSelect(
                '*'
            )->addFieldToFilter(
                'is_active',
                ['eq' => \Shesh\Test\Model\Test::STATUS_ENABLED]
            )->setOrder(
                'creation_time',
                'desc'
            );
        }
        return $this->items;
    }

    /**
     * Get Test Id
     *
     * @return int
     */
    public function getTestId()
    {
        return 1;
    }

    /**
     * Return identifiers for produced content
     *
     * @return array
     */
    public function getIdentities()
    {
        return [\Shesh\Test\Model\Test::CACHE_TAG . '_' . $this->getTestModel()->getId()];
    }
    /**
     * Test function
     *
     * @return string
     */
    public function getTest()
    {
        return 'This is a test function for some logic...';
      
    }

    
}  
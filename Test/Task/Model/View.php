<?php

namespace Test\Task\Model;

use \Magento\Framework\Model\AbstractModel;
use \Magento\Framework\DataObject\IdentityInterface;
use \Test\Task\Api\Data\ViewInterface;

/**
 * Class File
 * @package Test\Task\Model
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class View extends AbstractModel implements ViewInterface, IdentityInterface
{
    /**
     * Cache tag
     */
    const CACHE_TAG = 'test_task_view';

    /**
     * Post Initialization
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Test\Task\Model\ResourceModel\View');
    }
    /**
     * Get Value
     *
     * @return string|null
     */
    public function geValue()
    {
        return $this->getData(self::VALUE);
    }
    /**
     * Return identities
     * @return string[]
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->geValue()];
    }
    /**
     * Set $Value
     *
     * @param string $Value
     * @return $this
     */
    public function setValue($Value)
    {
        return $this->setData(self::VALUE, $Value);
    }
}

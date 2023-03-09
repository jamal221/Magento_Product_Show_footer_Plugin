<?php


namespace Test\Task\Model\ResourceModel;
use \Magento\Framework\Model\ResourceModel\Db\AbstractDb;


class ProductPrice extends AbstractDb
{


    /**
     * Resource initialization
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('catalogrule_product_price', 'rule_product_price_id');
    }
}

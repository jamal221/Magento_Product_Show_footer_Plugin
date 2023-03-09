<?php
namespace Test\Task\Model\ResourceModel\View;

use \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Test\Task\Model\ResourceModel\View as ViewAlias;
use Test\Task\Model\View;

class Collection extends AbstractCollection
{
    /**
     * Remittance File Collection Constructor
     * @return void
     */
    protected function _construct()
    {
        $this->_init(View::class, ViewAlias::class);
//        $this->_map['fields']['page_id']='main_table.page_id';

    }
}

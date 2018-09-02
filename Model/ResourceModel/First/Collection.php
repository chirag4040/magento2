<?php
namespace Simple\First\Model\ResourceModel\First;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Simple\First\Model\First', 'Simple\First\Model\ResourceModel\First');
    }

}

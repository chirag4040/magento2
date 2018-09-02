<?php
namespace Simple\First\Model;
class First extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'simple_first';

    protected function _construct()
    {
        $this->_init('Simple\First\Model\ResourceModel\First');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }
}
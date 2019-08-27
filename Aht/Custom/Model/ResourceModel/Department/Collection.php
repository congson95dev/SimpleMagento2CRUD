<?php

namespace Aht\Custom\Model\ResourceModel\Department;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init('Aht\Custom\Model\Department', 'Aht\Custom\Model\ResourceModel\Department');
    }

}
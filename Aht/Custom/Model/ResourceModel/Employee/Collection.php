<?php

namespace Aht\Custom\Model\ResourceModel\Employee;

use Magento\Eav\Model\Entity\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init('Aht\Custom\Model\Employee', 'Aht\Custom\Model\ResourceModel\Employee');
    }

}
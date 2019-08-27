<?php

namespace Aht\Custom\Model;

use \Magento\Framework\Model\AbstractModel;

class Department extends AbstractModel
{
    protected function _construct()
    {
        $this->_init('Aht\Custom\Model\ResourceModel\Department');
    }
}
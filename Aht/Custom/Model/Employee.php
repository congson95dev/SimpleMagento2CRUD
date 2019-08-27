<?php

namespace Aht\Custom\Model;

use \Magento\Framework\Model\AbstractModel;

class Employee extends AbstractModel
{
	const ENTITY = 'employee';
	
    protected function _construct()
    {
        $this->_init('Aht\Custom\Model\ResourceModel\Employee');
    }
}
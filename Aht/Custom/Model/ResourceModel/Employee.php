<?php

namespace Aht\Custom\Model\ResourceModel;

class Employee extends \Magento\Eav\Model\Entity\AbstractEntity
{
    protected function _construct()
    {
        $this->_read = 'aht_custom_employee_read';
        $this->_write = 'aht_custom_employee_write';
    }

    public function getEntityType() {
        if(empty($this->_type)) {
            $this->setType(\Aht\Custom\Model\Employee::ENTITY);
        }

        return parent::getEntityType();
    }
}
<?php

namespace Aht\Custom\Block\Frontend;

use \Magento\Framework\View\Element\Template\Context;
use \Magento\Framework\View\Element\Template;

class Index extends Template
{

    public function __construct(
        Context $context,
        \Aht\Custom\Model\DepartmentFactory $departmentFactory,
        \Aht\Custom\Model\EmployeeFactory $employeeFactory
    )
    {
        $this->_departmentFactory = $departmentFactory;
        $this->_employeeFactory = $employeeFactory;
        parent::__construct($context);
    }

    public function getDepartments() {
        $department = $this->_departmentFactory->create();
        $result = $department->getCollection();
        return $result;
    }

    public function getEmployees() {
        $employee = $this->_employeeFactory->create();
        $result = $employee->getCollection();
        $result->addAttributeToSelect('service_years')
            ->addAttributeToSelect('dob')
            ->addAttributeToSelect('salary')
            ->addAttributeToSelect('vat_number')
            ->addAttributeToSelect('note');
        $result->getSelect()->join(
             ['department'],
             'e.department_id = department.id',
             []
        )->columns("department.name AS department_name");
        
        return $result;
    }
}
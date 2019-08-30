<?php

namespace Aht\Custom\Block\Adminhtml\Employee;

class Manage extends \Magento\Backend\Block\Template
{
    protected $_template = 'employee/manage.phtml';

	public function __construct(
		\Magento\Backend\Block\Template\Context $context,
		\Aht\Custom\Model\EmployeeFactory $employeeFactory
	) {
		$this->_employeeFactory = $employeeFactory;
		parent::__construct($context);
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

	public function getAddUrl()
    {
        return $this->getUrl('employee/employee/add');
    }

    public function getDetailUrl($id)
    {
        return $this->getUrl('employee/employee/detail/id/'.$id);
    }

    public function getDeleteUrl($id)
    {
        return $this->getUrl('employee/employee/delete/id/'.$id);
    }
}
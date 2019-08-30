<?php

namespace Aht\Custom\Block\Adminhtml\Employee;

class Detail extends \Magento\Backend\Block\Template
{
    protected $_template = 'employee/detail.phtml';

	public function __construct(
		\Magento\Backend\Block\Template\Context $context,
		\Aht\Custom\Model\EmployeeFactory $employeeFactory,
		\Aht\Custom\Model\DepartmentFactory $departmentFactory
	) {
		$this->_employeeFactory = $employeeFactory;
		$this->_departmentFactory = $departmentFactory;
		parent::__construct($context);
	}

	public function viewEmployee(){
        $id = $this->getRequest()->getParam('id');
        $employee = false;
        if ($id) {
        	$employee = $this->_employeeFactory->create()->load($id);
        }
		return $employee;
	}

	public function getDepartments() {
		$department = $this->_departmentFactory->create();
		$result = $department->getCollection();
		return $result;
	}

	public function getAddUrl()
    {
        return $this->getUrl('employee/employee/save');
    }

	public function getEditUrl($id)
    {
        return $this->getUrl('employee/employee/save/id/'.$id);
    }
}
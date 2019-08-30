<?php

namespace Aht\Custom\Block\Adminhtml\Department;

class Manage extends \Magento\Backend\Block\Template
{
    protected $_template = 'department/manage.phtml';

	public function __construct(
		\Magento\Backend\Block\Template\Context $context,
		\Aht\Custom\Model\DepartmentFactory $departmentFactory
	) {
		$this->_departmentFactory = $departmentFactory;
		parent::__construct($context);
	}

	public function getDepartments() {
		$department = $this->_departmentFactory->create();
		$result = $department->getCollection();
		return $result;
	}

	public function getAddUrl()
    {
        return $this->getUrl('department/manage/add');
    }

    public function getDetailUrl($id)
    {
        return $this->getUrl('department/manage/detail/id/'.$id);
    }

    public function getDeleteUrl($id)
    {
        return $this->getUrl('department/manage/delete/id/'.$id);
    }
}
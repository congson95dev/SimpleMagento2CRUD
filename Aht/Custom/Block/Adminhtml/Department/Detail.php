<?php

namespace Aht\Custom\Block\Adminhtml\Department;

class Detail extends \Magento\Backend\Block\Template
{
    protected $_template = 'department/detail.phtml';

	public function __construct(
		\Magento\Backend\Block\Template\Context $context,
		\Aht\Custom\Model\DepartmentFactory $departmentFactory
	) {
		$this->_departmentFactory = $departmentFactory;
		parent::__construct($context);
	}

	public function viewDepartment(){
        $id = $this->getRequest()->getParam('id');
        $department = false;
        if ($id) {
        	$department = $this->_departmentFactory->create()->load($id);
        }
		return $department;
	}

	public function getAddUrl()
    {
        return $this->getUrl('department/manage/save');
    }

	public function getEditUrl($id)
    {
        return $this->getUrl('department/manage/save/id/'.$id);
    }
}
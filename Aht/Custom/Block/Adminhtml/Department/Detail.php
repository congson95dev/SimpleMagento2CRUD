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
}
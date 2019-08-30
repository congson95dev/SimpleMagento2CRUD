<?php

namespace Aht\Custom\Controller\Adminhtml\Employee;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Aht\Custom\Model\EmployeeFactory;

class Detail extends \Magento\Backend\App\Action
{
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        EmployeeFactory $employeeFactory
    ) {
        parent::__construct($context);
        $this->_resultPageFactory = $resultPageFactory;
        $this->_employeeFactory = $employeeFactory;
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Aht_Custom::manage_department');
    }

    public function execute()
    {
        $result = $this->_resultPageFactory->create();
        return $result;
    }
}
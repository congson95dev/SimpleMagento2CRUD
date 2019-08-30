<?php

namespace Aht\Custom\Controller\Adminhtml\Employee;

use Magento\Backend\App\Action\Context;
use Aht\Custom\Model\EmployeeFactory;

class Save extends \Magento\Framework\App\Action\Action
{
    public function __construct(
        Context $context,
        EmployeeFactory $employeeFactory
    ) {
        $this->_employeeFactory = $employeeFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $data = $this->getRequest()->getPostValue();

        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($data) {
            try{
                $id = $this->getRequest()->getParam('id');

                $employee = $this->_employeeFactory->create();

                if($id){
                    $employee->load($id);
                    $data['entity_id'] = $id;
                }
                $employee->setData($data);
                $employee->save();


                if ($id) {
                    $this->messageManager->addSuccessMessage(__('Update Employee Successfully.'));
                } else {
                    $this->messageManager->addSuccessMessage(__('Add Employee Successfully.'));
                }

                $resultRedirect->setPath('*/*/');

                return $resultRedirect;
            }
            catch (\Exception $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            }

        }
    }
}
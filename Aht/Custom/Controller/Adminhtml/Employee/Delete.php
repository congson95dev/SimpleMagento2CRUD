<?php

namespace Aht\Custom\Controller\Adminhtml\Employee;

use Magento\Backend\App\Action\Context;
use Aht\Custom\Model\EmployeeFactory;
use Aht\Custom\Model\ResourceModel\Employee as EmployeeResourceModel;

class Delete extends \Magento\Framework\App\Action\Action
{
    public function __construct(
        Context $context,
        EmployeeFactory $employeeFactory,
        EmployeeResourceModel $resourceModel
    ) {
        $this->_resourceModel = $resourceModel;
        $this->_employeeFactory = $employeeFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();

        try{
            $id = $this->getRequest()->getParam('id');

            $model = $this->_employeeFactory->create();
            $resource = $this->_resourceModel->load($model,$id);
            $resource->delete($model);


            $this->messageManager->addSuccessMessage(__('Delete Employee Successfully.'));

            // Redirect to your form page (or anywhere you want...)
            $resultRedirect->setPath('*/*/index');

            return $resultRedirect;
        }
        catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
        }
    }
}
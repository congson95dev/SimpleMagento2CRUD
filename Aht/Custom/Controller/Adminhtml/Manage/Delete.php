<?php

namespace Aht\Custom\Controller\Adminhtml\Manage;

use Magento\Backend\App\Action\Context;
use Aht\Custom\Model\DepartmentFactory;
use Aht\Custom\Model\ResourceModel\Department as DepartmentResourceModel;

class Delete extends \Magento\Framework\App\Action\Action
{
    public function __construct(
        Context $context,
        DepartmentFactory $departmentFactory,
        DepartmentResourceModel $resourceModel
    ) {
        $this->resourceModel = $resourceModel;
        $this->departmentFactory = $departmentFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();

        try{
            $id = $this->getRequest()->getParam('id');

//          The 1st way :
//          $model = $this->studentsFactory->create()->load($id);
//          $model->delete();

//          The 2nd way :
            $model = $this->departmentFactory->create();
            $resource = $this->resourceModel->load($model,$id);
            $resource->delete($model);


            $this->messageManager->addSuccessMessage(__('Delete Department Successfully.'));

            // Redirect to your form page (or anywhere you want...)
            $resultRedirect->setPath('*/*/index');

            return $resultRedirect;
        }
        catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
        }
    }
}
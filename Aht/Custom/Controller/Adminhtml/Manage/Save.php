<?php

namespace Aht\Custom\Controller\Adminhtml\Manage;

use Magento\Backend\App\Action\Context;
use Aht\Custom\Model\DepartmentFactory;

class Save extends \Magento\Framework\App\Action\Action
{
    public function __construct(
        Context $context,
        DepartmentFactory $departmentFactory
    ) {
        $this->_departmentFactory = $departmentFactory;
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

                $department = $this->_departmentFactory->create();

                if($id){
                    $department->load($id);
                    $data['id'] = $id;
                }
                $department->setData($data);
                $department->save();


                if ($id) {
                    $this->messageManager->addSuccessMessage(__('Update Department Successfully.'));
                } else {
                    $this->messageManager->addSuccessMessage(__('Add Department Successfully.'));
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
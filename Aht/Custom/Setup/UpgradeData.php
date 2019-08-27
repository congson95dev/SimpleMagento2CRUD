<?php
namespace Aht\Custom\Setup;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class UpgradeData implements UpgradeDataInterface {
    protected $departmentFactory;
    protected $employeeFactory;

    public function __construct(
        \Aht\Custom\Model\DepartmentFactory $departmentFactory,
        \Aht\Custom\Model\EmployeeFactory $employeeFactory
    ) {
        $this->departmentFactory = $departmentFactory;
        $this->employeeFactory = $employeeFactory; 
    }

    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context) {
        $setup->startSetup();
       
        // insert 1st department and employee
        $salesDepartment = $this->departmentFactory->create();
        $salesDepartment->setName('Sales');
        $salesDepartment->save();

        $employee = $this->employeeFactory->create();
        $employee->setDepartmentId($salesDepartment->getId());
        $employee->setEmail('dev20102015@gmail.com');
        $employee->setFirstName('Fudu');
        $employee->setLastName('1');
        $employee->setServiceYears(3);
        $employee->setDob('1999-01-01');
        $employee->setSalary('5400.00');
        $employee->setVatNumber('GB12345678');
        $employee->setNote('Just some notes from Fudu');
        $employee->save();

        // insert 2nd department and employee
        // $salesDepartment = $this->departmentFactory->create();
        // $salesDepartment->setName('Sales');
        // $salesDepartment->save();

        // $employee = $this->employeeFactory->create();
        // $employee->setDepartmentId($salesDepartment->getId());
        // $employee->setEmail('dev20102015@gmail.com');
        // $employee->setFirstName('Fudu');
        // $employee->setLastName('1');
        // $employee->setServiceYears(3);
        // $employee->setDob('1999-01-01');
        // $employee->setSalary('5400.00');
        // $employee->setVatNumber('GB12345678');
        // $employee->setNote('Just some notes from Fudu');
        // $employee->save();

        // // insert 3rd department and employee
        // $salesDepartment = $this->departmentFactory->create();
        // $salesDepartment->setName('Sales');
        // $salesDepartment->save();

        // $employee = $this->employeeFactory->create();
        // $employee->setDepartmentId($salesDepartment->getId());
        // $employee->setEmail('dev20102015@gmail.com');
        // $employee->setFirstName('Fudu');
        // $employee->setLastName('1');
        // $employee->setServiceYears(3);
        // $employee->setDob('1999-01-01');
        // $employee->setSalary('5400.00');
        // $employee->setVatNumber('GB12345678');
        // $employee->setNote('Just some notes from Fudu');
        // $employee->save();

        $setup->endSetup();
    }
}
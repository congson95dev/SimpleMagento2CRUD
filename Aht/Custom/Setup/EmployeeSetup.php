<?php

namespace Aht\Custom\Setup;

use Magento\Eav\Setup\EavSetup;

class EmployeeSetup extends EavSetup {

    public function getDefaultEntities() {

        $employeeEntity = \Aht\Custom\Model\Employee::ENTITY;

        $entities = [
            $employeeEntity => [
                'entity_model' => 'Aht\Custom\Model\ResourceModel\Employee',
                'table' => $employeeEntity . '_entity',
                'attributes' => [
                    'department_id' => [
                        'type' => 'static',
                    ],
                    'email' => [
                        'type' => 'static',
                    ],
                    'first_name' => [
                        'type' => 'static',
                    ],
                    'last_name' => [
                        'type' => 'static',
                    ],
                ],
            ],
        ];

        return $entities;
    }
}
<?php

return [
    'client' => [
        'label' => 'Client',
        'plural_label' => 'Clients',
        'navigation' => [
            'label' => 'Clients',
            'group' => 'Management',
        ],
        'form' => [
            'name' => 'Name',
            'phone' => 'Phone',
            'email' => 'Email',
            'address' => 'Address',
        ],
        'table' => [
            'name' => 'Name',
            'phone' => 'Phone',
            'email' => 'Email',
            'address' => 'Address',
            'created_at' => 'Created at',
            'updated_at' => 'Updated at',
        ],
        'relation_managers' => [
            'vehicles' => [
                'label' => 'Vehicles',
                'title' => 'Vehicles',
                'form' => [
                    'brand' => 'Brand',
                    'model' => 'Model',
                    'year' => 'Year',
                    'license_plate' => 'License Plate',
                ],
                'table' => [
                    'brand' => 'Brand',
                    'model' => 'Model',
                    'year' => 'Year',
                    'license_plate' => 'License Plate',
                ],
            ],
        ],
    ],

    'vehicle' => [
        'label' => 'Vehicle',
        'plural_label' => 'Vehicles',
        'navigation' => [
            'label' => 'Vehicles',
            'group' => 'Management',
        ],
        'form' => [
            'client_id' => 'Client',
            'brand' => 'Brand',
            'model' => 'Model',
            'year' => 'Year',
            'license_plate' => 'License Plate',
        ],
        'table' => [
            'client' => 'Client',
            'brand' => 'Brand',
            'model' => 'Model',
            'year' => 'Year',
            'license_plate' => 'License Plate',
            'created_at' => 'Created at',
            'updated_at' => 'Updated at',
        ],
        'relation_managers' => [
            'services' => [
                'label' => 'Services',
                'title' => 'Services',
                'form' => [
                    'description' => 'Description',
                    'cost' => 'Cost',
                    'date' => 'Date',
                ],
                'table' => [
                    'description' => 'Description',
                    'cost' => 'Cost',
                    'date' => 'Date',
                ],
            ],
        ],
    ],

    'service' => [
        'label' => 'Service',
        'plural_label' => 'Services',
        'navigation' => [
            'label' => 'Services',
            'group' => 'Management',
        ],
        'form' => [
            'vehicle_id' => 'Vehicle',
            'description' => 'Description',
            'cost' => 'Cost',
            'date' => 'Date',
        ],
        'table' => [
            'vehicle' => 'Vehicle',
            'cost' => 'Cost',
            'date' => 'Date',
            'created_at' => 'Created at',
            'updated_at' => 'Updated at',
        ],
    ],
];

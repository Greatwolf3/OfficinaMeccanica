<?php

return [
    'client' => [
        'label' => 'Cliente',
        'plural_label' => 'Clienti',
        'navigation' => [
            'label' => 'Clienti',
            'group' => 'Gestione',
        ],
        'form' => [
            'name' => 'Nome',
            'phone' => 'Telefono',
            'email' => 'Email',
            'address' => 'Indirizzo',
        ],
        'table' => [
            'name' => 'Nome',
            'phone' => 'Telefono',
            'email' => 'Email',
            'address' => 'Indirizzo',
            'created_at' => 'Creato il',
            'updated_at' => 'Aggiornato il',
        ],
        'relation_managers' => [
            'vehicles' => [
                'label' => 'Veicoli',
                'title' => 'Veicoli',
                'form' => [
                    'brand' => 'Marca',
                    'model' => 'Modello',
                    'year' => 'Anno',
                    'license_plate' => 'Targa',
                ],
                'table' => [
                    'brand' => 'Marca',
                    'model' => 'Modello',
                    'year' => 'Anno',
                    'license_plate' => 'Targa',
                ],
            ],
        ],
    ],
    'vehicle' => [
        'label' => 'Veicolo',
        'plural_label' => 'Veicoli',
        'navigation' => [
            'label' => 'Veicoli',
            'group' => 'Gestione',
        ],
        'form' => [
            'client_id' => 'Cliente',
            'brand' => 'Marca',
            'model' => 'Modello',
            'year' => 'Anno',
            'license_plate' => 'Targa',
        ],
        'table' => [
            'client' => 'Cliente',
            'brand' => 'Marca',
            'model' => 'Modello',
            'year' => 'Anno',
            'license_plate' => 'Targa',
            'created_at' => 'Creato il',
            'updated_at' => 'Aggiornato il',
        ],
        'relation_managers' => [
            'services' => [
                'label' => 'Servizi',
                'title' => 'Servizi',
                'form' => [
                    'description' => 'Descrizione',
                    'cost' => 'Costo',
                    'date' => 'Data',

                ],
                'table' => [
                    'description' => 'Descrizione',
                    'cost' => 'Costo',
                    'date' => 'Data',
                ],
            ],
        ],
    ],
    'service' => [
        'label' => 'Servizio',
        'plural_label' => 'Servizi',
        'navigation' => [
            'label' => 'Servizi',
            'group' => 'Gestione',
        ],
        'form' => [
            'vehicle_id' => 'Veicolo',
            'description' => 'Descrizione',
            'cost' => 'Costo',
            'date' => 'Data',
        ],
        'table' => [
            'vehicle' => 'Veicolo',
            'cost' => 'Costo',
            'date' => 'Data',
            'description'=>'Descrizione',
            'created_at' => 'Creato il',
            'updated_at' => 'Aggiornato il',
        ],
    ],
];

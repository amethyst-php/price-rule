<?php

return [
    'name' => 'PriceRule',
    'description' => 'PriceRule',
    'attributes' => [
        'class_name' => [
            'label' => 'Class',
            'description' => 'The class used to calculate the price'
        ],
        'payload' => [
            'label' => 'Payload',
            'description' => 'The configuration used by the class to calculate the price'
        ]
    ]
]
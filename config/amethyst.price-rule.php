<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Data
    |--------------------------------------------------------------------------
    |
    | Here you can change the table name and the class components.
    |
    */
    'data' => [
        'price-rule' => [
            'table'      => 'amethyst_price_rules',
            'comment'    => 'Price Rule',
            'model'      => Railken\Amethyst\Models\PriceRule::class,
            'schema'     => Railken\Amethyst\Schemas\PriceRuleSchema::class,
            'repository' => Railken\Amethyst\Repositories\PriceRuleRepository::class,
            'serializer' => Railken\Amethyst\Serializers\PriceRuleSerializer::class,
            'validator'  => Railken\Amethyst\Validators\PriceRuleValidator::class,
            'authorizer' => Railken\Amethyst\Authorizers\PriceRuleAuthorizer::class,
            'faker'      => Railken\Amethyst\Fakers\PriceRuleFaker::class,
            'manager'    => Railken\Amethyst\Managers\PriceRuleManager::class,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Http configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure the routes
    |
    */
    'http' => [
        'admin' => [
            'price-rule' => [
                'enabled'     => true,
                'controller'  => Railken\Amethyst\Http\Controllers\Admin\PriceRulesController::class,
                'router'      => [
                    'as'        => 'price-rule.',
                    'prefix'    => '/price-rules',
                ],
            ],
        ],
    ],
];

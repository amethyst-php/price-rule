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
            'model'      => Amethyst\Models\PriceRule::class,
            'schema'     => Amethyst\Schemas\PriceRuleSchema::class,
            'repository' => Amethyst\Repositories\PriceRuleRepository::class,
            'serializer' => Amethyst\Serializers\PriceRuleSerializer::class,
            'validator'  => Amethyst\Validators\PriceRuleValidator::class,
            'authorizer' => Amethyst\Authorizers\PriceRuleAuthorizer::class,
            'faker'      => Amethyst\Fakers\PriceRuleFaker::class,
            'manager'    => Amethyst\Managers\PriceRuleManager::class,
            'attributes' => [
                'class_name' => [
                    'options' => [
                        Amethyst\PriceRules\BasePriceRule::class,
                        Amethyst\PriceRules\ExpressionPriceRule::class,
                    ],
                ],
            ],
        ],
    ],
];

<?php

namespace Railken\Amethyst\Authorizers;

use Railken\Lem\Authorizer;
use Railken\Lem\Tokens;

class PriceRuleAuthorizer extends Authorizer
{
    /**
     * List of all permissions.
     *
     * @var array
     */
    protected $permissions = [
        Tokens::PERMISSION_CREATE => 'price-rule.create',
        Tokens::PERMISSION_UPDATE => 'price-rule.update',
        Tokens::PERMISSION_SHOW   => 'price-rule.show',
        Tokens::PERMISSION_REMOVE => 'price-rule.remove',
    ];
}

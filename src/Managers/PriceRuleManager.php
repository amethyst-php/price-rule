<?php

namespace Amethyst\Managers;

use Amethyst\Common\ConfigurableManager;
use Railken\Lem\Manager;

/**
 * @method \Amethyst\Models\PriceRule newEntity()
 * @method \Amethyst\Schemas\PriceRuleSchema getSchema()
 * @method \Amethyst\Repositories\PriceRuleRepository getRepository()
 * @method \Amethyst\Serializers\PriceRuleSerializer getSerializer()
 * @method \Amethyst\Validators\PriceRuleValidator getValidator()
 * @method \Amethyst\Authorizers\PriceRuleAuthorizer getAuthorizer()
 */
class PriceRuleManager extends Manager
{
    use ConfigurableManager;

    /**
     * @var string
     */
    protected $config = 'amethyst.price-rule.data.price-rule';
}

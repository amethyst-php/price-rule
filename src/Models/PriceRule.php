<?php

namespace Railken\Amethyst\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Railken\Amethyst\Common\ConfigurableModel;
use Railken\Lem\Contracts\EntityContract;

/**
 * @property object $payload
 */
class PriceRule extends Model implements EntityContract
{
    use SoftDeletes;
    use ConfigurableModel;

    /**
     * Create a new Eloquent model instance.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        $this->ini('amethyst.price-rule.data.price-rule');
        parent::__construct($attributes);
    }

    public function calculate($price, array $vars = [])
    {
        $rule = new $this->class;

        return $rule->calculate($this, $price, ['vars' => $vars]);
    }
}

<?php

namespace Amethyst\Models;

use Amethyst\Common\ConfigurableModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
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
        $class = $this->class_name;
        $rule = new $class();

        return $rule->calculate($this, $price, ['vars' => $vars]);
    }
}

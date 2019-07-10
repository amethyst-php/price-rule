<?php

namespace Amethyst\Fakers;

use Amethyst\PriceRules\BasePriceRule;
use Faker\Factory;
use Railken\Bag;
use Railken\Lem\Faker;

class PriceRuleFaker extends Faker
{
    /**
     * @return \Railken\Bag
     */
    public function parameters()
    {
        $faker = Factory::create();

        $bag = new Bag();
        $bag->set('name', $faker->name);
        $bag->set('description', $faker->text);
        $bag->set('class_name', BasePriceRule::class);
        $bag->set('payload', ['x' => 1]);

        return $bag;
    }
}

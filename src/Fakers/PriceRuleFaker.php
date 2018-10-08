<?php

namespace Railken\Amethyst\Fakers;

use Faker\Factory;
use Railken\Amethyst\PriceRules\OneTimePriceRule;
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
        $bag->set('class_name', OneTimePriceRule::class);

        return $bag;
    }
}

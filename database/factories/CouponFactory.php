<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Coupon;
use Faker\Generator as Faker;

$factory->define(Coupon::class, function (Faker $faker) {
    return [
            'is_active'=>1,
            'status'=>0,
            'coupon'=>strtoupper($faker->unique()->bothify ('**********')),
    ];
});

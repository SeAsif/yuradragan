<?php

use Faker\Generator as Faker;

$factory->define(App\Todo::class, function (Faker $faker) {
    return [
        //
        'title' => $this->faker->sentence(4),
        'description' => $this->faker->sentence(20),
        'user_id' => 1,
        'status' => 'ACTIVE'

    ];
});

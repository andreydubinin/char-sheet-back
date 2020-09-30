<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Charsheet;
use Faker\Generator as Faker;

$factory->define(Charsheet::class, function (Faker $faker) {
    return [
        'name'        => $faker->name(),
        'player_name' => $faker->name(),
        'conception'  => $faker->text(),
        'appearance'  => $faker->text(),
        'step'        => $faker->numberBetween(1, 8),
        'defence'     => $faker->numberBetween(1, 8),
        'resistance'  => $faker->numberBetween(1, 8),
        'charisma'    => $faker->numberBetween(1, 8),
        'experience'  => $faker->numberBetween(1, 8),
        'injury'      => $faker->numberBetween(1, 5),
        'flaws'       => [
            $faker->text(20),
            $faker->text(15),
            $faker->text(18),
        ],
        'traits'      => [
            'start'    => [
                $faker->text(10),
                $faker->text(7),
            ],
            'beginner' => [
                $faker->text(10),
                $faker->text(7),
            ],
        ],
        'characteristics' => [

        ]
    ];
});

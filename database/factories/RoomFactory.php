<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Room;
use App\Employee;
use Faker\Generator as Faker;

$factory->define(Room::class, function (Faker $faker) {
    return [
        'employee_id'=>function () {
        return factory(Employee::class)->create()->id;
        },

    ];
});

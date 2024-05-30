<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Customer;
use App\Newclass;
use App\Room;
use Faker\Generator as Faker;

$factory->define(Newclass::class, function (Faker $faker) {
    return [
        'room_id'=>function () {
        return factory(Room::class)->create()->id;
        },
        'customer_id'=>function () {
        return factory(Customer::class)->create()->id;
        },
        'description'=>$faker->text,
    ];
});

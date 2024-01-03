<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Employee;
use Faker\Generator as Faker;

$factory->define(Employee::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'gender'=>$faker->jobTitle,
        'position'=>$faker->country,
        'kata'=>$faker->catchPhrase(),
        'sosmed'=>$faker->company,
        'birth_date'=>$faker->date,
        'religion'=>$faker->streetSuffix,
        'entered_date'=>$faker->date,
        'phone'=>$faker->phoneNumber,
        'address'=>$faker->address,
    ];
});

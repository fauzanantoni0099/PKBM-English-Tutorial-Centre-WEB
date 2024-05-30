<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Book;
use App\Customer;
use App\Employee;
use App\Program;
use Faker\Generator as Faker;

$factory->define(Customer::class, function (Faker $faker) {
    $price_class = 12000;
    $payment_price = 24000;
    $register = 12000;
    $remaining_payment = $payment_price - ($price_class + $register);
    return [
        'date'=>$faker->date(),
        'employee_id'=>function () {
        return factory(Employee::class)->create()->id;
        },
        'program_id'=>function () {
            return factory(Program::class)->create()->id;
        },
        'book_id'=>function () {
        return factory(Book::class)->create()->id;
        },
        'class_room'=>$faker->randomDigit(),
        'price_class'=>$price_class,
        'register'=>'12000',
        'status_customer'=>'siswa',
        'name'=>$faker->name,
        'gender'=>'laki-laki',
        'birth_date'=>$faker->date(),
        'school'=>'mahasiswa',
        'address'=>$faker->address,
        'phone'=>$faker->phoneNumber(),
        'status'=>'baru',
        'payment_status'=>'lunas',
        'payment_price'=>$payment_price,
        'remaining_payment'=>$remaining_payment
    ];
});

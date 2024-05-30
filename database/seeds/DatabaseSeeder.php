<?php

use Illuminate\Database\Seeder;
use App\Employee;
use App\Program;
use App\Customer;
use App\Newclass;
use App\Book;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(Employee::class, 10)->create();
        factory(Program::class, 10)->create();
        factory(Book::class, 10)->create();
        factory(Customer::class, 10)->create();
        factory(Newclass::class, 10)->create();
    }
}

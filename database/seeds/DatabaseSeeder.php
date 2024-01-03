<?php

use Illuminate\Database\Seeder;
use App\Employee;
use App\Program;
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
        factory(Employee::class, 20)->create();
        factory(Program::class, 5)->create();
        factory(Book::class, 5)->create();
    }
}
